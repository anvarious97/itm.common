<?php

namespace ITMobile\ITMobileCommon\Dto\User;

use ITMobile\ITMobileCommon\Dto\BaseDto;
use ITMobile\ITMobileCommon\Dto\Traits\CamelCaseDataTransferObject;
use ITMobile\ITMobileCommon\Dto\Traits\TracksProvidedFields;
use ITMobile\ITMobileCommon\Enums\User\UserStatus;
use Spatie\DataTransferObject\Attributes\CastWith;
use Spatie\DataTransferObject\Casters\EnumCaster;

class UserListFilterDto extends BaseDto
{
    use CamelCaseDataTransferObject, TracksProvidedFields;

    public ?string $id;
    public ?string $companyId;
    public ?string $name;
    public ?string $email;
    public ?string $phone;
    public ?string $role;
    #[CastWith(EnumCaster::class, UserStatus::class)]
    public ?UserStatus $status;

    public ?string $sortBy = 'created_at';
    public ?string $sortDir = 'desc';
}
