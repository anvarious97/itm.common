<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

/**
 * @property CompanyRelationViewDto[] $relations
 */
class CompanyRelationViewCollectionDto extends BaseDto
{
    /** @var CompanyRelationViewDto[] */
    #[CastWith(ArrayCaster::class, itemType: CompanyRelationViewDto::class)]
    public array $relations;
}
