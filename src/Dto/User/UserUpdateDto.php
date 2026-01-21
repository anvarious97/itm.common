<?php

namespace ITMobile\ITMobileCommon\Dto\User;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Enums\User\UserStatus;
use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property string $id UUID
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $password
 * @property string|null $companyId
 * @property UserStatus|null $status
 * @property array|null $details
 * @property array|null $settings
 */
class UserUpdateDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $id;
    public ?string $name;
    public ?string $email;
    public ?string $phone;
    public ?string $password;

    public ?string $companyId;

    #[CastWith(EnumCaster::class, UserStatus::class)]
    public ?UserStatus $status = UserStatus::ACTIVE;

    public ?array $details = [];
    public ?array $settings = [];
}
