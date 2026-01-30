<?php

namespace ITMobile\ITMobileCommon\Support\Builder;

use Illuminate\Database\Eloquent\Builder;

class QueryHelper
{
    public static function applyFilters(
        Builder $query,
        array $filters,
        array $allowed,
        array $custom = []
    ): void {
        foreach ($filters as $key => $value) {
            if (! in_array($key, $allowed, true)) {
                continue;
            }

            if (isset($custom[$key])) {
                $custom[$key]($query, $value);

                continue;
            }

            $query->where($key, $value);
        }
    }

    public static function applySorting(
        Builder $query,
        array $sort,
        array $allowed
    ): void {
        foreach ($sort as $field) {
            $direction = str_starts_with($field, '-') ? 'desc' : 'asc';
            $column = ltrim($field, '-');

            if (in_array($column, $allowed, true)) {
                $query->orderBy($column, $direction);
            }
        }
    }
}
