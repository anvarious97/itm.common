<?php

namespace ITMobile\ITMobileCommon\Dto\User;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Dto\Traits\CamelCaseDataTransferObject;
use ITMobile\ITMobileCommon\Enums\User\UserStatus;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * Полные данные аутентифицированного пользователя: поля из UserDto (id → userId) + поля из токена.
 *
 * @property string $userId UUID
 * @property string|null $companyId UUID
 * @property string $name
 * @property string|null $email
 * @property string|null $phone
 * @property UserStatus $status
 * @property array $roles
 * @property array $permissions
 * @property array $details
 * @property array $settings
 * @property array $relatedCompanyIds UUIDs
 * @property bool $isSuperAdmin
 * @property string|null $impersonatorId UUID
 * @property int|null $tokenVersion
 */
class AuthenticatedUserDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $userId;

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

    public array $relatedCompanyIds = [];

    public bool $isSuperAdmin = false;

    public ?string $impersonatorId = null;

    public ?int $tokenVersion = null;
}
