<?php

namespace App\Models\FE;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    protected $table = 'forum_posts';

    protected $fillable = [
        'title',
        'user_id',
        'content'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
