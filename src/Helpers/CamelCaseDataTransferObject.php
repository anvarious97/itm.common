<?php

namespace ITMobile\ITMobileCommon\Helpers;

trait CamelCaseDataTransferObject
{
    public static function fromSnake(array $data): static
    {
        $camelData = [];

        foreach ($data as $key => $value) {
            $camelKey = lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $key))));
            $camelData[$camelKey] = $value;
        }

        return new static($camelData);
    }
}
