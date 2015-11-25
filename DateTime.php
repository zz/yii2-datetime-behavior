<?php

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