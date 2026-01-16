<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servo extends Model
{
    use HasFactory;
    protected $table ='servos';
    protected $fillable = [
        'id',
        'status_servo',
    ];
}
