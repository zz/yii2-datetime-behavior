<?php
/**
 * @author David Hirtz <hello@davidhirtz.com>
 * @copyright Copyright (c) 2015 David Hirtz
 * @version 1.0.1
 */

namespace davidhirtz\yii2\datetime;

use DateTimeZone;
use yii\base\Behavior;
use yii\db\ActiveRecord;
use Yii;

/**
 * Class DateTimeBehavior
 * @package davidhirtz\yii2\behaviors
 */
class DateTimeBehavior extends Behavior
{
	const TYPE_DATE='date';
	const TYPE_DATETIME='datetime';
	const TYPE_TIMESTAMP='timestamp';

	/**
	 * @var array list of attributes that should be transformed to DateTime instances.
	 * This can be either an array of attribute names as values, or attribute names as
	 * keys with the corresponding database column type date, datetime or int as values.
	 */
	public $attributes;

	/**
	 * @var array
	 */
	static private $cache=array();

	/**
	 * @var DateTimeZone
	 */
	private $utc;

	/**
	 * @var DateTimeZone
	 */
	private $timezone;

	/**
	 * Sets timezones.
	 */
	public function init()
	{
		$this->utc=new DateTimeZone('UTC');
		$this->timezone=new DateTimeZone(Yii::$app->getTimeZone());

		parent::init();
	}

	/**
	 * Attaches after find event.
	 * @inheritdoc
	 */
	public function events()
	{
		return [
			ActiveRecord::EVENT_AFTER_FIND=>'afterFind',
		];
	}

	/**
	 * Transforms attributes.
	 */
	public function afterFind()
	{
		/**
		 * @var ActiveRecord $owner
		 */
		$owner=$this->owner;

		/**
		 * Search for date columns.
		 */
		if($this->attributes===null)
		{
			if(!isset(self::$cache[$owner->tableName()]))
			{
				self::$cache[$owner->tableName()]=array();

				foreach($owner->getTableSchema()->columns as $column)
				{
					if(in_array($column->dbType, array(self::TYPE_DATE, self::TYPE_DATETIME)))
					{
						self::$cache[$owner->tableName()][$column->name]=$column->dbType;
					}
				}
			}

			$this->attributes=self::$cache[$owner->tableName()];
		}

		/**
		 * Transform attributes.
		 */
		foreach($this->attributes as $column=>$type)
		{
			if(is_numeric($column))
			{
				$column=$type;
				$type=self::TYPE_TIMESTAMP;
			}

			if($attribute=$owner->getAttribute($column))
			{
				if(is_numeric($attribute))
				{
					$attribute='@'.$attribute;
				}

				switch($type)
				{
					case self::TYPE_DATE:
						$attribute=new Date($attribute, $this->utc);
						break;

					case self::TYPE_DATETIME:
						$attribute=new DateTime($attribute, $this->utc);
						break;

					case self::TYPE_TIMESTAMP:
						$attribute=new Timestamp($attribute, $this->utc);
						break;
				}

				$owner->setAttribute($column, $attribute->setTimeZone($this->timezone));
			}
		}
	}
}