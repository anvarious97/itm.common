<?php

namespace ITMobile\ITMobileCommon\Dto;

use ITMobile\ITMobileCommon\Helpers\CamelCaseDataTransferObject;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

abstract class BaseDto extends DataTransferObject
{
    use CamelCaseDataTransferObject;

    /**
     * @throws UnknownProperties
     */
    public static function fromArray(array $data): static
    {
        return new static(...$data);
    }
}
