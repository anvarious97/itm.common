<?php

declare(strict_types=1);

namespace ITMobile\ITMobileCommon\Dto\Company;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Dto\Traits\CamelCaseDataTransferObject;

/**
 * Краткий профиль руководителя компании (роль `director`) для списка/карточки.
 *
 * @property string $id UUID
 * @property string $name
 */
class CompanyDirectorDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $id;

    public string $name;
}
