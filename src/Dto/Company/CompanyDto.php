<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyType;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property int $id
 * @property int $cityId
 * @property string $name
 * @property CompanyType $type
 * @property array $details
 * @property array $settings
 * @property bool $isDeleted
 */
class CompanyDto extends BaseDto
{
    public int $id;

    public int $cityId;

    public string $name;

    #[CastWith(EnumCaster::class, CompanyType::class)]
    public CompanyType $type;

    public array $details;

    public array $settings;

    public bool $isDeleted;
}
