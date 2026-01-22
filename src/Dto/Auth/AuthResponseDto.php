<?php

namespace ITMobile\ITMobileCommon\Dto\Auth;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Dto\User\AuthenticatedUserDto;

/**
 * @property AuthTokenDto $token
 * @property AuthenticatedUserDto $user
 */
class AuthResponseDto extends BaseDto
{
    public AuthTokenDto $token;
    public AuthenticatedUserDto $user;
}
