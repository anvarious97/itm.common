<?php

namespace ITMobile\ITMobileCommon\Pagination;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider;

class PaginationServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (class_exists(EloquentBuilder::class)) {
            EloquentBuilder::macro(
                'apiPaginate',
                function ($perPage = null, $columns = ['*'], $pageName = 'page', $page = null) {
                    /** @var EloquentBuilder $this */
                    /** @var LengthAwarePaginator $paginator */
                    $paginator = $this->paginate($perPage, $columns, $pageName, $page);

                    return new ApiPaginator(
                        $paginator->items(),
                        $paginator->total(),
                        $paginator->perPage(),
                        $paginator->currentPage(),
                        $paginator->getOptions(),
                    );
                }
            );
        }
    }
}
