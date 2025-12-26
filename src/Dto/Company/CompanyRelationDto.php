<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyRelationType;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property int $companyId
 * @property int $relatedCompanyId
 * @property CompanyRelationType $relationTyp
 */
class CompanyRelationDto extends BaseDto
{
    public int $companyId;

    public int $relatedCompanyId;

    #[CastWith(EnumCaster::class, CompanyRelationType::class)]
    public CompanyRelationType $relationType;
}
