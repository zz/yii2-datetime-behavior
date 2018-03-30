<?php
/**
 * @author David Hirtz <hello@easyconn.com>
 * @copyright Copyright (c) 2017 David Hirtz
 * @version 1.1.2
 */
namespace easyconn\yii2\datetime;
use DateTimeZone;
use Yii;

/**
 * Class DateTimeValidator.
 * @package app\components\validators
 */
class DateTimeValidator extends \yii\validators\Validator
{
	/**
	 * @var string
	 */
	public $dateClass;

	/**
	 * @var string
	 */
	public $timezone;

	/**
	 * Sets default values.
	 */
	public function init()
	{
		if($this->message===null)
		{
			$this->message=Yii::t('yii', 'The format of {attribute} is invalid.');
		}

		if(!$this->timezone)
		{
			$this->timezone=new DateTimeZone(Yii::$app->getTimeZone());
		}

		if(!$this->dateClass)
		{
			$this->dateClass='\easyconn\yii2\datetime\DateTime';
		}

		parent::init();
	}

	/**
	 * Validates DateTime.
	 * @param \yii\db\ActiveRecord $model
	 * @param string $attribute
	 */
	public function validateAttribute($model, $attribute)
	{
		if(!$model->{$attribute} instanceof $this->dateClass)
		{
			try
			{
				$callback=function($matches)
				{
					return $matches[2].'/'.$matches[1].'/'.($matches[3] ?: date('Y'));
				};

				$model->{$attribute}=@new $this->dateClass(preg_replace_callback('#^(\d{1,2})\.(\d{1,2})\.?(\d{0,4})#', $callback, $model->{$attribute}), $this->timezone);
			}
			catch(\Exception $ex)
			{
				$this->addError($model, $attribute, $this->message);
			}
		}
	}
}
