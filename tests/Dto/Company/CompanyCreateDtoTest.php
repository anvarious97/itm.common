<?php

use ITMobile\ITMobileCommon\Dto\Company\CompanyCreateDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyType;

it('CompanyCreateDto with all fields', function () {
    $dto = new CompanyCreateDto(
        cityId: 1,
        name: 'Test Company',
        type: CompanyType::DISPATCH,
        details: ['foo' => 'bar'],
        settings: ['a' => 1],
    );

    expect($dto->cityId)->toBe(1)
                        ->and($dto->name)->toBe('Test Company')
                        ->and($dto->type)->toBe(CompanyType::DISPATCH)
                        ->and($dto->details)->toBeArray()
                        ->and($dto->settings)->toBeArray();
});

it('CompanyCreateDto allows nullable fields', function () {
    $dto = new CompanyCreateDto(
        cityId: 1,
        name: 'Test Company',
        type: CompanyType::DISPATCH,
        details: null,
        settings: null,
    );

    expect($dto->details)->toBeNull()
                         ->and($dto->settings)->toBeNull();
});

it('CompanyCreateDto from array', function () {
    $data = [
        'cityId' => 1,
        'name' => 'Test Company',
        'type' => 'dispatch',
        'details' => ['foo' => 'bar'],
        'settings' => ['a' => 1],
    ];

    $dto = CompanyCreateDto::fromArray($data);

    expect($dto->cityId)->toBe(1)
                        ->and($dto->name)->toBe('Test Company')
                        ->and($dto->type)->toBeInstanceOf(CompanyType::class)
                        ->and($dto->type->value)->toBe('dispatch')
                        ->and($dto->details)->toBe(['foo' => 'bar'])
                        ->and($dto->settings)->toBe(['a' => 1]);
});

it('CompanyCreateDto handles nullable fields from array', function () {
    $data = [
        'cityId' => 1,
        'name' => 'Test Company',
        'type' => 'dispatch',
        'details' => null,
        'settings' => null,
    ];

    $dto = CompanyCreateDto::fromArray($data);

    expect($dto->details)->toBeNull()
                         ->and($dto->settings)->toBeNull()
                         ->and($dto->type->value)->toBe('dispatch');
});
