<?php

namespace ITMobile\ITMobileCommon\Tests\Enums\Company;

use ITMobile\ITMobileCommon\Enums\Company\CompanyType;

it('CompanyType has expected values', function () {
    expect(CompanyType::DISPATCH->value)->toBe('dispatch');
});

it('CompanyType has expected labels', function () {
    expect(CompanyType::DISPATCH->label())->toBe('Диспетчерская');
});
