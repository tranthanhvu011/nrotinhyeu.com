<?php

namespace App\Models\FE;

use Illuminate\Database\Eloquent\Model;

class TransLog extends Model
{
    const STATUS_SUCCESS = 1;
    const STATUS_WRONG_AMOUNT = 2;
    const STATUS_ERROR = 3;
    const STATUS_SYSTEM_ERROR = 4;
    const STATUS_PROCESSING = 0;
    protected $table = 'trans_log';

    protected $fillable = [
        'id',
        'name',
        'amount',
        'seri',
        'pin',
        'type',
        'status',
        'trans_id',
        'date',
        'giatri'
    ];
}
