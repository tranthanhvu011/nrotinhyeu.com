<?php

namespace App\Services;

use App\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Laratrust\Laratrust;

class MenuFilter implements FilterInterface
{
    public function transform($item)
    {
        if(isset($item['route']) && Route::has($item['route'])){
            $user = Auth::user();
            $item['restricted'] = !$user->hasPermission($item['route']);
        }
        return $item;
    }
}
