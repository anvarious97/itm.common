<?php

namespace ITMobile\ITMobileCommon\Dto;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class BaseDto extends DataTransferObject
{
    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $data): static
    {
        return new static(...$data);
    }
}
