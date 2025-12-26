<?php

namespace ITMobile\ITMobileCommon\Tests\Dto\Company;

use ITMobile\ITMobileCommon\Dto\Company\CompanyUpdateDto;

it('CompanyUpdateDto with partial fields', function () {
    $dto = new CompanyUpdateDto(
        id: 10,
        cityId: null,
        name: 'Updated name',
        type: null,
        details: null,
        settings: ['x' => 'y'],
    );

    expect($dto->id)->toBe(10)
        ->and($dto->name)->toBe('Updated name')
        ->and($dto->settings)->toBeArray()
        ->and($dto->type)->toBeNull();
});

it('CompanyUpdateDto from array', function () {
    $data = [
        'id' => 10,
        'cityId' => 5,
        'name' => 'Updated Company',
        'type' => 'dispatch',
        'details' => ['x' => 'y'],
        'settings' => ['setting' => true],
    ];

    $dto = CompanyUpdateDto::fromArray($data);

    expect($dto->id)->toBe(10)
        ->and($dto->cityId)->toBe(5)
        ->and($dto->name)->toBe('Updated Company')
        ->and($dto->type->value)->toBe('dispatch')
        ->and($dto->details)->toBe(['x' => 'y'])
        ->and($dto->settings)->toBe(['setting' => true]);
});

it('CompanyUpdateDto handles nullable fields from array', function () {
    $data = [
        'id' => 20,
        'cityId' => null,
        'name' => null,
        'type' => null,
        'details' => null,
        'settings' => null,
    ];

    $dto = CompanyUpdateDto::fromArray($data);

    expect($dto->cityId)->toBeNull()
        ->and($dto->name)->toBeNull()
        ->and($dto->type)->toBeNull()
        ->and($dto->details)->toBeNull()
        ->and($dto->settings)->toBeNull();
});
