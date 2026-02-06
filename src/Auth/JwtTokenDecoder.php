<?php

namespace ITMobile\ITMobileCommon\Auth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use ITMobile\ITMobileCommon\Dto\User\AuthenticatedUserDto;

readonly class JwtTokenDecoder
{
    public function __construct(
        private string $publicKey,
        private string $algorithm = 'RS256',
    )
    {}

    public function decode(string $token)
    {
        $payload = JWT::decode(
            $token,
            new Key($this->publicKey, $this->algorithm),
        );

        $roles = $payload->rol ?? $payload->roles;

        return new AuthenticatedUserDto(
            userId: $payload->sub ?? $payload->user_id,
            companyId: $payload->com ?? $payload->company_id,
            roles: $roles,
            permissions: $payload->per ?? $payload->permissions,
            isSuperAdmin: in_array('super-admin', $roles, true),
            impersonatorId: null
        );
    }
}
