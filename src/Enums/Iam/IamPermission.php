<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Enums\Iam;

/**
 * Канонические имена прав Spatie (UC_001 / матрица доступа).
 */
enum IamPermission: string
{
    case UsersView = 'users.view';
    case UsersCreate = 'users.create';
    case UsersUpdate = 'users.update';
    case UsersDelete = 'users.delete';
    case UsersImpersonate = 'users.impersonate';
    case UsersRestore = 'users.restore';

    case RolesView = 'roles.view';
    case RolesCreate = 'roles.create';
    case RolesUpdate = 'roles.update';
    case RolesDelete = 'roles.delete';
    case RolesAssign = 'roles.assign';
    case RolesCompanyCreate = 'roles.company.create';
    case RolesCompanyUpdate = 'roles.company.update';
    case RolesCompanyDelete = 'roles.company.delete';

    case PermissionsView = 'permissions.view';
    case PermissionsCreate = 'permissions.create';
    case PermissionsUpdate = 'permissions.update';
    case PermissionsDelete = 'permissions.delete';
    case PermissionsAssign = 'permissions.assign';

    case CompaniesView = 'companies.view';
    case CompaniesUpdate = 'companies.update';

    /**
     * @return list<string>
     */
    public static function values(): array
    {
        return array_map(static fn (self $p): string => $p->value, self::cases());
    }
}
