<?php

namespace ITMobile\ITMobileCommon\Enums\Asop;

enum AsopStatus: string
{
    case ONLINE = 'ONLINE';
    case OFFLINE = 'OFFLINE';
    case NONE = 'NONE';

    public static function values(): array
    {
        return array_column(self::cases(), 'name');
    }
}
