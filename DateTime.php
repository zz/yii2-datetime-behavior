<?php
/**
 * @author David Hirtz <hello@easyconn.com>
 * @copyright Copyright (c) 2015 David Hirtz
 * @version 1.0.0
 */

namespace easyconn\yii2\datetime;

/**
 * Class DateTime.
 * @package easyconn\yii2\datetime
 */
class DateTime extends \DateTime
{
	/**
	 * @return string the formatted UTC datetime string.
	 */
	public function __toString()
	{
		return gmdate('Y-m-d H:i:s', $this->getTimestamp());
	}
}
