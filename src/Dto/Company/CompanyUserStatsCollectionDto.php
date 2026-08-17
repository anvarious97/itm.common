<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\ArrayCaster;

/**
 * Ответ GET /internal/company-user-stats.
 *
 * @property CompanyUserStatsDto[] $data
 */
class CompanyUserStatsCollectionDto extends BaseDto
{
    /** @var CompanyUserStatsDto[] */
    #[CastWith(ArrayCaster::class, itemType: CompanyUserStatsDto::class)]
    public array $data = [];
}
