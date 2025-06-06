<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
    protected $table = 'tbl_matching';

    protected $fillable = [
        'cabang',
        'mo_number',
        'dn_number',
        'item_code',
        'branch',
        'awb_number',
        'receive_date',
        'receive_name',
        'receve_time',
        'expedition',
        'is_need_matching'
    ];

    public $timestamps = true;
}
