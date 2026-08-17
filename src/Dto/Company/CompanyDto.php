<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Dto\Traits\CamelCaseDataTransferObject;
use ITMobile\ITMobileCommon\Enums\Company\CompanyType;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * Карточка компании (GET/POST/PUT). Агрегаты — как у CompanyListDto.
 *
 * @property string $id UUID
 * @property string $cityId UUID
 * @property string $name
 * @property CompanyType $type
 * @property array $details
 * @property array $settings
 * @property bool $isDeleted
 * @property int $relatedCount
 * @property int $inboundRelatedCount
 * @property int $usersCount
 * @property CompanyDirectorDto[] $directors
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

    public int $relatedCount = 0;

    public int $inboundRelatedCount = 0;

    public int $usersCount = 0;

    /** @var CompanyDirectorDto[] */
    #[CastWith(ArrayCaster::class, itemType: CompanyDirectorDto::class)]
    public array $directors = [];
}
