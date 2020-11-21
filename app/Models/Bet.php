<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use HasFactory;

    public function crashes()
    {
        return $this->belongsTo(Crash::class, 'crash_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
