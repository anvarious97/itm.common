<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Enums\Iam;

/**
 * Базовый набор прав роли «руководитель компании» (director).
 */
final class DirectorRolePermissions
{
    /**
     * @return list<IamPermission>
     */
    public static function permissions(): array
    {
        return [
            IamPermission::CompaniesView,
            IamPermission::CompaniesUpdate,
            IamPermission::CompaniesRelatedAccess,
            IamPermission::UsersView,
            IamPermission::UsersCreate,
            IamPermission::UsersUpdate,
            IamPermission::RolesView,
            IamPermission::RolesAssign,
        ];
    }

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(
            static fn (IamPermission $p): string => $p->value,
            self::permissions()
        );
    }
}
