<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crash extends Model
{
    use HasFactory;

    public function bets()
    {
        return $this->hasMany(Bet::class, 'crash_id');
    }
}
