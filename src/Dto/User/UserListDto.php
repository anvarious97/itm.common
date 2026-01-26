<?php

namespace ITMobile\ITMobileCommon\Dto\User;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Dto\Traits\CamelCaseDataTransferObject;
use ITMobile\ITMobileCommon\Enums\User\UserStatus;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

/**
 * @property string $id UUID
 * @property string|null $companyId UUID
 * @property string $name
 * @property string|null $email
 * @property string|null $phone
 * @property UserStatus $status
 * @property array $roles
 * @property string|null $createdAt
 * @property string|null $updatedAt
 * @property string|null $deletedAt
 */
class UserListDto extends BaseDto
{
    use CamelCaseDataTransferObject;

    public string $id;

    public ?string $companyId;

    public string $name;

    public ?string $email;

    public ?string $phone;

    #[CastWith(EnumCaster::class, UserStatus::class)]
    public UserStatus $status;

    public array $roles = [];

    public ?string $createdAt = null;

    public ?string $updatedAt = null;

    public ?string $deletedAt = null;
}
