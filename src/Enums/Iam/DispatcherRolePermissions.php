<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Enums\Iam;

/**
 * Базовый набор прав роли «диспетчер».
 * Операционные права (наряды, мониторинг) появятся вместе с доменными сервисами.
 */
final class DispatcherRolePermissions
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
