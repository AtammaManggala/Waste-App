<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dailyTransactions extends Model
{
    use HasFactory;

    protected $table = 'daily_transaction';

    protected $fillable = [
        'user_id',
        'scan_date',
        'scan_time',
        'jml_botol',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
