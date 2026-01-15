<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

/**
 * @property CompanyAttributeDto[] $items
 */
class CompanyAttributesDto extends BaseDto
{
    /** @var CompanyAttributeDto[] */
    #[CastWith(ArrayCaster::class, itemType: CompanyAttributeDto::class)]
    public array $items;
}
