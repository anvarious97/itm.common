<?php

namespace ITMobile\ITMobileCommon\Dto\Auth;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Dto\Traits\CamelCaseDataTransferObject;

/**
 * @property string $accessToken
 * @property string $tokenType
 * @property int $expiresIn
 */
class AuthTokenDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $accessToken;

    public string $tokenType = 'Bearer';

    public int $expiresIn = 3600;
}
