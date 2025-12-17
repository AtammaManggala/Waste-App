<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    protected $table = 'reward_transactions';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'barcode',
    ];
}
