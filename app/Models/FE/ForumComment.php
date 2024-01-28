<?php

namespace App\Models\FE;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    protected $table = 'forum_comments';

    protected $fillable = [
        'forum_post_id',
        'user_id',
        'content'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
