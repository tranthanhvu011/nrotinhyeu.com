<?php

namespace App\Models\FE;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'player';

    protected $fillable = [
        'id',
        'account_id',
        'name',
        'head',
        'gender',
        'have_tennis_space_ship',
        'clan_id_sv1',
        'clan_id_sv2',
        'data_inventory',
        'data_location',
        'data_point',
        'data_magic_tree',
        'items_body',
        'items_bag',
        'items_box',
        'items_box_lucky_round',
        'friends',
        'enemies',
        'data_intrinsic',
        'data_item_time',
        'data_item_time_sieu_cap',
        'data_task',
        'data_mabu_egg',
        'data_charm',
        'skills',
        'skills_shortcut',
        'pet',
        'data_black_ball',
        'data_side_task',
        'create_time',
        'violate',
        'pointPvp',
        'NguHanhSonPoint',
        'data_card',
        'bill_data',
        'thoi_vang',
        'PointBoss',
        'dataArchiverment',
        'ResetSkill',
        'PointCauCa',
        'LastDoanhTrai',
        'DataDay',
        'DataOnline',
        'DataNap',
        'tichdiem'
    ];
}
