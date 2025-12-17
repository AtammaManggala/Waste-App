<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countTransactions extends Model
{
    use HasFactory;

    protected $table = 'count_transaction';

    protected $fillable = [
        'user_id',
        'jml_botol',
        'jml_point',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }
}
