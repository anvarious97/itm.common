<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Enums\Company\CompanyType;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property int $id
 * @property int|null $cityId
 * @property string|null $name
 * @property CompanyType|null $type
 * @property array|null $details
 * @property array|null $settings
 */
class CompanyUpdateDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public int $id;

    public ?int $cityId;

    public ?string $name;

    #[CastWith(EnumCaster::class, CompanyType::class)]
    public ?CompanyType $type;

    public ?array $details;

    public ?array $settings;
}
