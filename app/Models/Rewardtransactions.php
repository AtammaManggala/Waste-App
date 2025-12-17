<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rewardtransactions extends Model
{
    use HasFactory;

    protected $table = 'reward_transactions';

    protected $fillable = [
        'user_id',
        'reward_id',
        'total_points',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function reward()
    {
        return $this->belongsTo(rewards::class, 'reward_id');
    }

}