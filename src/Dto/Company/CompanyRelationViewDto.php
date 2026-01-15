<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyRelationType;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property CompanyListDto $company
 * @property CompanyListDto $relatedCompany
 * @property CompanyRelationType $relationType
 */
class CompanyRelationViewDto extends BaseDto
{
    public CompanyListDto $company;

    public CompanyListDto $relatedCompany;

    #[CastWith(EnumCaster::class, CompanyRelationType::class)]
    public CompanyRelationType $relationType;
}
