<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Dto\Traits\CamelCaseDataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

/**
 * Агрегаты пользователей по одной компании (internal IAM → шлюз).
 *
 * @property string $companyId UUID
 * @property int $usersCount
 * @property CompanyDirectorDto[] $directors
 */
class CompanyUserStatsDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $companyId;

    public int $usersCount = 0;

    /** @var CompanyDirectorDto[] */
    #[CastWith(ArrayCaster::class, itemType: CompanyDirectorDto::class)]
    public array $directors = [];
}
