<?php

namespace davidhirtz\yii2\datetime;

/**
 * Class Timestamp.
 * @package davidhirtz\yii2\datetime
 *
 * @author David Hirtz <hello@davidhirtz.com>
 * @copyright Copyright &copy; David Hirtz, 2015
 * @version 1.0.0
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