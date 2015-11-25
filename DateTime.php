<?php
/**
 * @author David Hirtz <hello@davidhirtz.com>
 * @copyright Copyright (c) 2015 David Hirtz
 * @version 1.0.0
 */

namespace davidhirtz\yii2\datetime;

/**
 * Class DateTime.
 * @package davidhirtz\yii2\datetime
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