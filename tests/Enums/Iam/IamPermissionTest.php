<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Tests\Enums\Iam;

use ITMobile\ITMobileCommon\Enums\Iam\IamPermission;

it('IamPermission values cover core access matrix', function (): void {
    expect(IamPermission::values())->toContain(
        'users.view',
        'roles.assign',
        'permissions.assign',
        'companies.view',
        'companies.create',
        'companies.update',
        'companies.delete',
        'companies.related.access',
    );

    expect(IamPermission::values())->not->toContain('admin.settings');
});

it('IamPermission enum has stable string values', function (): void {
    expect(IamPermission::RolesView->value)->toBe('roles.view');
    expect(IamPermission::CompaniesCreate->value)->toBe('companies.create');
    expect(IamPermission::CompaniesDelete->value)->toBe('companies.delete');
    expect(IamPermission::CompaniesRelatedAccess->value)->toBe('companies.related.access');
});
