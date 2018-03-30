<?php
/**
 * @author David Hirtz <hello@davidhirtz.com>
 * @copyright Copyright (c) 2015 David Hirtz
 * @version 1.0.0
 */

namespace easyconn\yii2\datetime;

/**
 * Class Date.
 * @package easyconn\yii2\datetime
 */
class Date extends \DateTime
{
	/**
	 * @return string the formatted UTC date string.
	 */
	public function __toString()
	{
		return gmdate('Y-m-d', $this->getTimestamp());
	}
}
