<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Tests\Dto\Company;

use ITMobile\ITMobileCommon\Dto\Company\CompanyDirectorDto;
use ITMobile\ITMobileCommon\Dto\Company\CompanyListDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyType;

it('CompanyListDto defaults aggregates to zero', function (): void {
    $dto = new CompanyListDto(
        id: 'company-id',
        cityId: 'city-id',
        name: 'ООО Тест',
        type: CompanyType::DISPATCH,
    );

    expect($dto->relatedCount)->toBe(0)
        ->and($dto->inboundRelatedCount)->toBe(0)
        ->and($dto->usersCount)->toBe(0)
        ->and($dto->directors)->toBe([]);
});

it('CompanyListDto accepts directors and counts', function (): void {
    $dto = CompanyListDto::fromArray([
        'id' => 'company-id',
        'cityId' => 'city-id',
        'name' => 'ООО Тест',
        'type' => 'dispatch',
        'relatedCount' => 2,
        'inboundRelatedCount' => 1,
        'usersCount' => 5,
        'directors' => [
            ['id' => 'user-1', 'name' => 'Иван'],
        ],
    ]);

    expect($dto->relatedCount)->toBe(2)
        ->and($dto->inboundRelatedCount)->toBe(1)
        ->and($dto->usersCount)->toBe(5)
        ->and($dto->directors)->toHaveCount(1)
        ->and($dto->directors[0])->toBeInstanceOf(CompanyDirectorDto::class)
        ->and($dto->directors[0]->name)->toBe('Иван');
});
