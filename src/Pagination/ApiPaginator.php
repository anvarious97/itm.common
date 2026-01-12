<?php

namespace ITMobile\ITMobileCommon\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Simplified paginator used for api
 */
class ApiPaginator extends LengthAwarePaginator
{
    public function toArray(): array
    {
        return [
            'data' => $this->items(),
            'total' => $this->total(),
            'per_page' => $this->perPage(),
            'current_page' => $this->currentPage(),
            'last_page' => $this->lastPage(),
        ];
    }
}
