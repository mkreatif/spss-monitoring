<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'tbl_user'; // penting!

    protected $fillable = [
        'nik', 'name', 'role', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

