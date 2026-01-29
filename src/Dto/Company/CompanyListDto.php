<?php

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Dto\Traits\CamelCaseDataTransferObject;
use ITMobile\ITMobileCommon\Enums\Company\CompanyType;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property string $id UUID
 * @property string $cityId UUID
 * @property string $name
 * @property string|null $createdAt
 * @property string|null $updatedAt
 * @property string|null $deletedAt
 */
class CompanyListDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $id;

    public string $cityId;

    public string $name;

    #[CastWith(EnumCaster::class, CompanyType::class)]
    public CompanyType $type;

    public ?string $createdAt = null;

    public ?string $updatedAt = null;

    public ?string $deletedAt = null;
}
