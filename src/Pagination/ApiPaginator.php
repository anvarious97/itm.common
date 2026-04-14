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
            'perPage' => $this->perPage(),
            'currentPage' => $this->currentPage(),
            'lastPage' => $this->lastPage(),
        ];
    }
}
