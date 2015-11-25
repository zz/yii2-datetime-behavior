<?php

namespace davidhirtz\yii2\datetime;

/**
 * Class Date.
 * @package davidhirtz\yii2\datetime
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