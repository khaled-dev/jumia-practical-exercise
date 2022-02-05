<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Container\Container;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class CollectionService
{
    /**
     * paginate a given collection
     *
     * @param Collection $results
     * @param $pageSize
     * @return LengthAwarePaginator
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public static function paginate(Collection $results, $pageSize): LengthAwarePaginator
    {
        $page = Paginator::resolveCurrentPage('page');

        $total = $results->count();

        return self::paginator($results->forPage($page, $pageSize), $total, $pageSize, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);

    }

    /**
     * Create a new length-aware paginator instance.
     *
     * @param \Illuminate\Support\Collection $items
     * @param int $total
     * @param int $perPage
     * @param int $currentPage
     * @param array $options
     * @return \Illuminate\Pagination\LengthAwarePaginator
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    protected static function paginator($items, $total, $perPage, $currentPage, $options): LengthAwarePaginator
    {
        return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
            'items', 'total', 'perPage', 'currentPage', 'options'
        ));
    }
}
