<?php

namespace ITMobile\ITMobileCommon\Tests\Dto\Company;


use ITMobile\ITMobileCommon\Dto\Company\CompanyDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyType;

it('CompanyDto represents company data', function () {
    $dto = new CompanyDto(
        id: 1,
        cityId: 5,
        name: 'Company',
        type: CompanyType::DISPATCH,
        details: [],
        settings: [],
        isDeleted: false,
    );

    expect($dto->id)->toBeInt()
                    ->and($dto->isDeleted)->toBeFalse()
                    ->and($dto->name)->toBeString()
                    ->and($dto->type)->toBeInstanceOf(CompanyType::class)
                    ->and($dto->details)->toBeArray()
                    ->and($dto->settings)->toBeArray();
});

it('CompanyDto from array', function () {
    $data = [
        'id' => 1,
        'cityId' => 2,
        'name' => 'Company',
        'type' => 'dispatch',
        'details' => [],
        'settings' => [],
        'isDeleted' => false,
    ];

    $dto = CompanyDto::fromArray($data);

    expect($dto->id)->toBe(1)
                    ->and($dto->cityId)->toBe(2)
                    ->and($dto->name)->toBe('Company')
                    ->and($dto->type)->toBeInstanceOf(CompanyType::class)
                    ->and($dto->type->value)->toBe('dispatch')
                    ->and($dto->isDeleted)->toBeFalse();
});
