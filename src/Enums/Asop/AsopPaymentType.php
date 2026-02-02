<?php

namespace ITMobile\ITMobileCommon\Enums\Asop;

enum AsopPaymentType: string
{
    case TCARD = 'TCARD';
    case IPS = 'IPS';
    case CASH = 'CASH';

    public static function values(): array
    {
        return array_column(self::cases(), 'name');
    }
}
