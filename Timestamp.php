<?php
/**
 * @author David Hirtz <hello@easyconn.com>
 * @copyright Copyright (c) 2015 David Hirtz
 * @version 1.0.0
 */

namespace easyconn\yii2\datetime;

/**
 * Class Timestamp.
 * @package easyconn\yii2\datetime
 */
class Timestamp extends \DateTime
{
	/**
	 * @return string the formatted UTC timestamp.
	 */
	public function __toString()
	{
		return $this->getTimestamp();
	}
}
