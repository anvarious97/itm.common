<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Enums\Iam;

/**
 * Базовый набор прав роли «водитель».
 * Права водительского приложения появятся вместе с itm.driverapp.
 */
final class DriverRolePermissions
{
    /**
     * @return list<IamPermission>
     */
    public static function permissions(): array
    {
        return [];
    }

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return [];
    }
}
