<?php

namespace davidhirtz\yii2\datetime;

/**
 * Class DateTime.
 * @package davidhirtz\yii2\datetime
 *
 * @author David Hirtz <hello@davidhirtz.com>
 * @copyright Copyright &copy; David Hirtz, 2015
 * @version 1.0.0
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