<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyType;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property int $cityId
 * @property string $name
 * @property CompanyType $type
 * @property array|null $details
 * @property array|null $settings
 */
class CompanyCreateDto extends BaseDto
{
    public int $cityId;
    public string $name;

    #[CastWith(EnumCaster::class, CompanyType::class)]
    public CompanyType $type;

    /** @var array<string, mixed>|null */
    public ?array $details;
    /** @var array<string, mixed>|null */
    public ?array $settings;
}
