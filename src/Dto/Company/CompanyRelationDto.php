<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyRelationType;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property string $companyId UUID
 * @property string $relatedCompanyId UUID
 * @property CompanyRelationType $relationTyp
 */
class CompanyRelationDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $companyId;

    public string $relatedCompanyId;

    #[CastWith(EnumCaster::class, CompanyRelationType::class)]
    public CompanyRelationType $relationType;
}
