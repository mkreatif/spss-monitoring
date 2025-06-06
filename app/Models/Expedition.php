<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expedition extends Model
{
    use HasFactory;

    protected $table = 'tbl_expedisi'; // penting!

       protected $fillable = [
        'expedition_name',
    ];

    public $timestamps = true;

}
