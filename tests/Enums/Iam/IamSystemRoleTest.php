<?php

declare(strict_types=1);

use ITMobile\ITMobileCommon\Enums\Iam\CompanyAdminRolePermissions;
use ITMobile\ITMobileCommon\Enums\Iam\DirectorRolePermissions;
use ITMobile\ITMobileCommon\Enums\Iam\IamSystemRole;

it('defines canonical system roles', function (): void {
    expect(IamSystemRole::Director->value)->toBe('director')
        ->and(IamSystemRole::SuperAdmin->value)->toBe('super-admin')
        ->and(IamSystemRole::Admin->value)->toBe('admin')
        ->and(IamSystemRole::CompanyAdmin->value)->toBe('company-admin')
        ->and(IamSystemRole::Dispatcher->value)->toBe('dispatcher')
        ->and(IamSystemRole::Driver->value)->toBe('driver')
        ->and(IamSystemRole::values())->toContain('director');
});

it('defines director role permission set', function (): void {
    expect(DirectorRolePermissions::values())
        ->toContain('companies.update')
        ->toContain('companies.view')
        ->toContain('users.view')
        ->not->toContain('companies.delete');
});

it('defines company-admin as a superset of director without platform-only perms', function (): void {
    $values = CompanyAdminRolePermissions::values();

    expect($values)
        ->toContain('users.delete')
        ->toContain('roles.company.create')
        ->toContain('users.impersonate')
        ->not->toContain('companies.delete')
        ->not->toContain('permissions.create')
        ->not->toContain('roles.create');
});
