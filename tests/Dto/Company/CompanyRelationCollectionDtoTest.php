<?php

namespace ITMobile\ITMobileCommon\Tests\Dto\Company;

use ITMobile\ITMobileCommon\Dto\Company\CompanyRelationCollectionDto;
use ITMobile\ITMobileCommon\Dto\Company\CompanyRelationDto;

it('CompanyRelationCollectionDto from array', function () {
    $data = [
        'relations' => [
            ['companyId' => 1, 'relatedCompanyId' => 2, 'relationType' => 'child'],
            ['companyId' => 1, 'relatedCompanyId' => 3, 'relationType' => 'supervisor'],
        ],
    ];

    $collection = CompanyRelationCollectionDto::fromArray($data);

    expect($collection->relations)->toHaveCount(2)
        ->and($collection->relations[0])->toBeInstanceOf(CompanyRelationDto::class)
        ->and($collection->relations[0]->relationType->value)->toBe('child')
        ->and($collection->relations[1]->relationType->value)->toBe('supervisor');
});

it('CompanyRelationCollectionDto throws exception on invalid array structure', function () {
    CompanyRelationCollectionDto::fromArray([
        'relations' => [['foo' => 'bar']],
    ]);
})->throws(\TypeError::class);
