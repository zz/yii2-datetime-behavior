<?php

namespace davidhirtz\yii2\datetime;

/**
 * Class Date.
 * @package davidhirtz\yii2\datetime
 *
 * @author David Hirtz <hello@davidhirtz.com>
 * @copyright Copyright &copy; David Hirtz, 2015
 * @version 1.0.0
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