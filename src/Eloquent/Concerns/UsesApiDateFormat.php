<?php

namespace ITMobile\ITMobileCommon\Eloquent\Concerns;

use DateTimeInterface;
use ITMobile\ITMobileCommon\Contracts\Date\ApiDateFormat;

trait UsesApiDateFormat
{
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format(ApiDateFormat::FORMAT);
    }
}
