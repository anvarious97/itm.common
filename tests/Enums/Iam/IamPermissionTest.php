<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Tests\Enums\Iam;

use ITMobile\ITMobileCommon\Enums\Iam\IamPermission;

it('IamPermission values cover core access matrix', function (): void {
    expect(IamPermission::values())->toContain('users.view', 'roles.assign', 'permissions.view');
});

it('IamPermission enum has stable string values', function (): void {
    expect(IamPermission::RolesView->value)->toBe('roles.view');
});
