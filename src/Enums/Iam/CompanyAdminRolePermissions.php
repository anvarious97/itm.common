<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Enums\Iam;

/**
 * Права роли «администратор компании»: все права контура компании
 * (чтобы можно было назначать руководителя, диспетчера и т.д.).
 */
final class CompanyAdminRolePermissions
{
    /**
     * @return list<IamPermission>
     */
    public static function permissions(): array
    {
        $merged = [
            ...DirectorRolePermissions::permissions(),
            IamPermission::UsersDelete,
            IamPermission::UsersRestore,
            IamPermission::UsersImpersonate,
            IamPermission::RolesCompanyCreate,
            IamPermission::RolesCompanyUpdate,
            IamPermission::RolesCompanyDelete,
            IamPermission::PermissionsAssign,
        ];

        $unique = [];
        foreach ($merged as $permission) {
            $unique[$permission->value] = $permission;
        }

        return array_values($unique);
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
