<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Template extends Model
{
    protected $table = 'tbl_template';

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
        'expedition_name'
    ];

    public $timestamps = true;
}
