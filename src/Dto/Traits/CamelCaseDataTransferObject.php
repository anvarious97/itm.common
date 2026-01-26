<?php

namespace ITMobile\ITMobileCommon\Dto\Traits;

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

    public function toSnake(): array
    {
        $snakeData = [];

        foreach ($this as $key => $value) {
            $snakeKey = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $key));
            $snakeData[$snakeKey] = $value;
        }

        return $snakeData;
    }

    public function onlyProvidedSnake(): array
    {
        if (! property_exists($this, 'providedFields')) {
            return $this->toSnake();
        }

        $data = [];
        foreach ($this->providedFields as $property) {
            if (! property_exists($this, $property)) {
                continue;
            }

            $value = $this->{$property};

            $snakeKey = strtolower(
                preg_replace('/([a-z])([A-Z])/', '$1_$2', $property)
            );

            $data[$snakeKey] = $value;
        }

        return $data;
    }
}
