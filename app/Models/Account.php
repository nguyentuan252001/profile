<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = [
        'ho_va_ten',
        'email',
        'password',
        'so_dien_thoai',
    ];
}
