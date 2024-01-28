<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const SUPER_ADMIN_ID = 1;
    const TEACHER_ID = 2;
    const STUDENT_ID = 3;
    
    protected $table = 'roles';

    protected $fillable = [
        'name', 'permissions',
    ];
    protected $casts = [
        'permissions' => 'array',
    ];

    protected $hidden = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function setPermissionsAttribute($value)
    {
        $this->attributes['permissions'] = json_encode(array_values(array_unique($value ?? [])));
    }

    public static function isSuperAdmin($roleId)
    {
        return $roleId == self::SUPER_ADMIN_ID;
    }
}
