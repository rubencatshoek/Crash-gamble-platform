<?php

namespace App\Filters;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Illuminate\Support\Facades\Auth;

class MenuFilter extends FilterInterface
{

    /**
     * @param array $item
     * @param Builder $builder
     * @return array|bool
     */
    public function transform($item, Builder $builder)
    {
        $isAdminRoute = isset($item['isAdminRoute']) && $item['isAdminRoute'];
        $isUserAdmin = Auth::user()->isAdmin();

        if ($isAdminRoute && !$isUserAdmin) {
            return false;
        }

        return $item;
    }

}
