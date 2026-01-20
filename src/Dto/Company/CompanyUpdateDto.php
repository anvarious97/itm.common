<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyType;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property string $id UUID
 * @property string|null $cityId UUID
 * @property string|null $name
 * @property CompanyType|null $type
 * @property array|null $details
 * @property array|null $settings
 */
class CompanyUpdateDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $id;

    public ?string $cityId;

    public ?string $name;

    #[CastWith(EnumCaster::class, CompanyType::class)]
    public ?CompanyType $type;

    public ?array $details;

    public ?array $settings;
}
