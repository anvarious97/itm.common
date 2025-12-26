<?php

namespace ITMobile\ITMobileCommon\Tests\Enums\Company;

use ITMobile\ITMobileCommon\Enums\Company\CompanyRelationType;

it('CompanyType has expected values', function () {
    expect(CompanyRelationType::CHILD->value)->toBe('child');
});

it('CompanyType has expected labels', function () {
    expect(CompanyRelationType::CHILD->label())->toBe('Дочерняя');
});
