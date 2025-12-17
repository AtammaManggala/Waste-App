<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rewards extends Model
{
    use HasFactory;

    protected $table = 'rewards';

    protected $fillable = [
        'reward_name',
        'point',
    ];

    public function rewardTransactions()
    {
        return $this->hasMany(Rewardtransactions::class, 'reward_id');
    }
}
