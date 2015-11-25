<?php

namespace davidhirtz\yii2\datetime;

/**
 * Class Timestamp.
 * @package davidhirtz\yii2\datetime
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