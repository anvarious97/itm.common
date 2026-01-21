<?php

namespace ITMobile\ITMobileCommon\Dto\User;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Enums\User\UserStatus;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property string $name
 * @property string|null $email
 * @property string|null $phone
 * @property string $password
 * @property string|null $companyId
 * @property UserStatus $status
 * @property array $details
 * @property array $settings
 */
class UserCreateDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $name;
    public ?string $email;
    public ?string $phone;
    public string $password;

    public ?string $companyId;

    #[CastWith(EnumCaster::class, UserStatus::class)]
    public UserStatus $status = UserStatus::ACTIVE;

    public array $details = [];

    public array $settings = [];
}
