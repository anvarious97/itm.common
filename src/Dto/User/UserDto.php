<?php

namespace ITMobile\ITMobileCommon\Dto\User;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Enums\User\UserStatus;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property string $id UUID
 * @property string|null $companyId UUID
 * @property string $name
 * @property string|null $email
 * @property string|null $phone
 * @property array $roles
 * @property array $permissions
 * @property array $details
 * @property array $settings
 */
class UserDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $id;

    public ?string $companyId;

    public string $name;

    public ?string $email;

    public ?string $phone;

    #[CastWith(EnumCaster::class, UserStatus::class)]
    public UserStatus $status;

    public array $roles;

    public array $permissions = [];

    public array $details = [];

    public array $settings = [];
}
