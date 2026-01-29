<?php

namespace ITMobile\ITMobileCommon\Support\Date;

use DateTimeInterface;
use ITMobile\ITMobileCommon\Contracts\Date\ApiDateFormat;

class DateNormalizer
{
    public static function normalize(DateTimeInterface|string|null $value): ?string
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof DateTimeInterface) {
            return $value->format(ApiDateFormat::FORMAT);
        }

        return $value;
    }
}
