<?php

declare(strict_types=1);

use ITMobile\ITMobileCommon\Enums\Iam\DirectorRolePermissions;
use ITMobile\ITMobileCommon\Enums\Iam\IamSystemRole;

it('defines canonical system roles', function (): void {
    expect(IamSystemRole::Director->value)->toBe('director')
        ->and(IamSystemRole::SuperAdmin->value)->toBe('super-admin')
        ->and(IamSystemRole::values())->toContain('director');
});

it('defines director role permission set', function (): void {
    expect(DirectorRolePermissions::values())
        ->toContain('companies.update')
        ->toContain('companies.view')
        ->toContain('users.view')
        ->not->toContain('companies.delete');
});
