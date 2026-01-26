<?php

namespace ITMobile\ITMobileCommon\Dto;

use JsonSerializable;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Stringable;
use Throwable;

abstract class BaseDto extends DataTransferObject implements JsonSerializable, Stringable
{
    /**
     * @throws UnknownProperties
     */
    public function __construct(array $parameters = [], ...$args)
    {
        if (method_exists($this, 'initProvidedFields')) {
            $this->initProvidedFields($parameters);
        }

        parent::__construct($parameters, ...$args);
    }

    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $data): static
    {
        return new static(...$data);
    }

    public function __toString(): string
    {
        try {
            return json_encode($this->toArray(), JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE) ?: '';
        } catch (Throwable) {
            return '';
        }
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
