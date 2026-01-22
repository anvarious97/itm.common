<?php

namespace ITMobile\ITMobileCommon\Dto\Auth;

use ITMobile\ITMobileCommon\Dto\BaseDto;

/**
 * @property string $login
 * @property string $password
 */
class LoginRequestDto extends BaseDto
{
    public string $login;
    public string $password;
}
