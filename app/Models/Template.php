<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Template extends Model
{
    use HasFactory;

    protected $table = 'tbl_template';

    protected $fillable = [
        'cabang',
        'mo_number',
        'dn_number',
        'item_code',
        'item_description',
        'branch',
        'awb_number',
        'receive_date',
        'receive_name',
        'receve_time',
        'expedition_id',
        'is_need_matching',
    ];

    public $timestamps = true;

    // 🔁 Relasi ke model Expedition
    public function expedition()
    {
        return $this->belongsTo(Expedition::class, 'expedition_id');
    }
}
