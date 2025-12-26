<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

class CompanyRelationCollectionDto extends BaseDto
{
    /** @var CompanyRelationDto[] */
    #[CastWith(ArrayCaster::class, itemType: CompanyRelationDto::class)]
    public array $relations;
}
