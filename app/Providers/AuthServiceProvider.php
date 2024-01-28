<?php

namespace App\Providers;

use App\Http\Controllers\RoleController;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $permissionsArray = [
            'user', 'role', 'class'
        ];
        foreach ($permissionsArray as $permission){
            Gate::define($permission, function ($user) use ($permission) {
                if(empty($user->permissions)) return true;
                $input = preg_quote($permission, '~');
                $result = preg_grep('~'.$input.'~', $user->permissions);
                if(!empty($result)) return true;
                return false;
            });
        }
    }
}
