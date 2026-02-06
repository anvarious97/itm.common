<?php

namespace ITMobile\ITMobileCommon\Auth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use ITMobile\ITMobileCommon\Dto\User\AuthenticatedUserDto;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

readonly class JwtTokenDecoder
{
    public function __construct(
        private string $publicKey,
        private string $algorithm = 'RS256',
    ) {}

    /**
     * @throws UnknownProperties|FileNotFoundException
     */
    public function decode(string $token): AuthenticatedUserDto
    {
        $payload = JWT::decode(
            $token,
            new Key($this->getPublicKey(), $this->algorithm),
        );

        $roles = $payload->rol ?? [];

        return new AuthenticatedUserDto(
            userId: $payload->sub,
            companyId: $payload->com ?? null,
            roles: $roles,
            permissions: $payload->per ?? [],
            isSuperAdmin: in_array('super-admin', $roles, true),
            impersonatorId: $payload->imp ?? null
        );
    }

    /**
     * @throws FileNotFoundException
     */
    private function getPublicKey(): string
    {
        // if starts with file:// => read file content
        if (str_starts_with($this->publicKey, 'file://')) {
            $path = substr($this->publicKey, 7);
            if (! file_exists($path)) {
                throw new FileNotFoundException(sprintf('Public key file not found: %s', $path));
            }
            $content = file_get_contents($path);
            if ($content === false) {
                throw new FileNotFoundException(sprintf('Cannot read public key file: %s', $path));
            }

            return $content;
        }

        // otherwise, we assume hat this is the key itself
        return $this->publicKey;
    }
}
