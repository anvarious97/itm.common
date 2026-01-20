<?php

namespace ITMobile\ITMobileCommon\Tests\Dto\Company;

use ITMobile\ITMobileCommon\Dto\Company\CompanyDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyType;

it('CompanyDto represents company data', function () {
    $dto = new CompanyDto(
        id: 'test-id',
        cityId: 'city-test-id',
        name: 'Company',
        type: CompanyType::DISPATCH,
        details: [],
        settings: [],
        isDeleted: false,
    );

    expect($dto->id)->toBeString()
        ->and($dto->isDeleted)->toBeFalse()
        ->and($dto->name)->toBeString()
        ->and($dto->type)->toBeInstanceOf(CompanyType::class)
        ->and($dto->details)->toBeArray()
        ->and($dto->settings)->toBeArray();
});

it('CompanyDto from array', function () {
    $data = [
        'id' => 'test-id',
        'cityId' => 'city-test-id',
        'name' => 'Company',
        'type' => 'dispatch',
        'details' => [],
        'settings' => [],
        'isDeleted' => false,
    ];

    $dto = CompanyDto::fromArray($data);

    expect($dto->id)->toBe('test-id')
        ->and($dto->cityId)->toBe('city-test-id')
        ->and($dto->name)->toBe('Company')
        ->and($dto->type)->toBeInstanceOf(CompanyType::class)
        ->and($dto->type->value)->toBe('dispatch')
        ->and($dto->isDeleted)->toBeFalse();
});
