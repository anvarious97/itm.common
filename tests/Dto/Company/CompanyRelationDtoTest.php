<?php

namespace ITMobile\ITMobileCommon\Tests\Dto\Company;


use ITMobile\ITMobileCommon\Dto\Company\CompanyRelationDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyRelationType;

it('CompanyRelationDto creates company relation dto', function () {
    $dto = new CompanyRelationDto(
        companyId: 1,
        relatedCompanyId: 2,
        relationType: CompanyRelationType::CHILD,
    );

    expect($dto->companyId)->toBe(1)
                           ->and($dto->relatedCompanyId)->toBe(2)
                           ->and($dto->relationType)->toBe(CompanyRelationType::CHILD);
});

it('CompanyRelationDto from array', function () {
    $data = [
        'companyId' => 1,
        'relatedCompanyId' => 2,
        'relationType' => 'child',
    ];

    $dto = CompanyRelationDto::fromArray($data);

    expect($dto->companyId)->toBe(1)
                           ->and($dto->relatedCompanyId)->toBe(2)
                           ->and($dto->relationType)->toBeInstanceOf(CompanyRelationType::class)
                           ->and($dto->relationType->value)->toBe('child');
});
