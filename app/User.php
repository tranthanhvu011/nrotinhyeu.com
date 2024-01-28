<?php

namespace App;

use App\Models\FE\Account;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'role_id', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasPermission($actionName)
    {
        if (is_null($actionName)) {
            return true;
        }

        if (Role::isSuperAdmin($this->role_id)) {
            return true;
        }

        if(!empty($this->permissions) && in_array($actionName, $this->permissions)){
            return true;
        }

        return false;
    }

    public function getPermissionsAttribute(){
        return $this->role->permissions;
    }

    public function account(){
        return $this->belongsTo(Account::class, 'username', 'username');
    }
}
