<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'name', 'teachers', 'students',
    ];
    protected $casts = [
        'teachers' => 'array',
        'students' => 'array',
    ];
}
