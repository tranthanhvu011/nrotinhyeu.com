<?php

namespace App\Models\FE;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';

    protected $table = 'account';

    protected $fillable = [
        'username',
        'password',
        'create_time',
        'update_time',
        'ban',
        'point_post',
        'last_post',
        'role',
        'is_admin',
        'last_time_login',
        'last_time_logout',
        'ip_address',
        'active',
        'thoi_vang',
        'server_login',
        'bd_player',
        'is_gift_box',
        'gift_time',
        'reward',
        'tongnap',
        'coin',
        'vnd',
        'recaf',
        'gioithieu',
        'mtvgt',
        // 'vip1',
        // 'vip2',
        // 'vip3',
        // 'vip4',
        // 'vip5',
        // 'vip6',
        'admin',
        'mkc2',
        'gmail',
        'tichdiem',
        'xacminh',
        'thoigian_xacminh',
        'del_pass2',
        'tichdiemweb'
    ];

    public function player(){
        return $this->belongsTo(Player::class, 'id', 'account_id');
    }
}
