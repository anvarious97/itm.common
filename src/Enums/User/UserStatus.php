<?php

namespace ITMobile\ITMobileCommon\Enums\User;

enum UserStatus: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case DELETED = 'deleted';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Активен',
            self::INACTIVE => 'Неактивен',
            self::DELETED => 'Удалён',
        };
    }
}
