<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyType;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property string $id UUID
 * @property string $cityId UUID
 * @property string $name
 * @property CompanyType $type
 * @property array $details
 * @property array $settings
 * @property bool $isDeleted
 */
class CompanyDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $id;

    public string $cityId;

    public string $name;

    #[CastWith(EnumCaster::class, CompanyType::class)]
    public CompanyType $type;

    public array $details;

    public array $settings;

    public bool $isDeleted;
}
