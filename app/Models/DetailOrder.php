<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'tbl_detailorder';

    protected $fillable = [
        'awb_number',
        'mo_number',
        'item_code',
        'item_description'
    ];

    public $timestamps = true;
}
