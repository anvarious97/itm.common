<?php

namespace ITMobile\ITMobileCommon\Dto\Traits;

trait TracksProvidedFields
{
    protected array $providedFields = [];

    public function getProvidedFields(): array
    {
        return $this->providedFields;
    }

    protected function initProvidedFields(array $parameters): void
    {
        $this->providedFields = array_keys($parameters);
    }

    public function isProvided(string $property): bool
    {
        return in_array($property, $this->providedFields, true);
    }
}
