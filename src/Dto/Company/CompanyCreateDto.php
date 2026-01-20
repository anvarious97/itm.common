<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyType;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property string $cityId UUID
 * @property string $name
 * @property CompanyType $type
 * @property array|null $details
 * @property array|null $settings
 */
class CompanyCreateDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $cityId;

    public string $name;

    #[CastWith(EnumCaster::class, CompanyType::class)]
    public CompanyType $type;

    /** @var array<string, mixed>|null */
    public ?array $details;

    /** @var array<string, mixed>|null */
    public ?array $settings;
}
