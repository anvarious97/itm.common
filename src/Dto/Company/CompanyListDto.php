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
 * Элемент списка компаний (UC_019 / ISD [1.4]).
 *
 * Счётчики связей заполняет itm.company; usersCount / directors — itm.iam через шлюз.
 *
 * @property string $id UUID
 * @property string $cityId UUID
 * @property string $name
 * @property CompanyType $type
 * @property string|null $createdAt
 * @property string|null $updatedAt
 * @property string|null $deletedAt
 * @property int $relatedCount
 * @property int $inboundRelatedCount
 * @property int $usersCount
 * @property CompanyDirectorDto[] $directors
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

    public int $relatedCount = 0;

    public int $inboundRelatedCount = 0;

    public int $usersCount = 0;

    /** @var CompanyDirectorDto[] */
    #[CastWith(ArrayCaster::class, itemType: CompanyDirectorDto::class)]
    public array $directors = [];
}
