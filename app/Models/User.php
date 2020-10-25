<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'paid_balance',
        'join_squad_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(UserRole::class);
    }

    public function squad()
    {
        return $this->belongsTo(Squad::class);
    }

    public function squadRole()
    {
        return $this->belongsTo(SquadRole::class);
    }

    /**
     * Checks if the user is an admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role->name === 'ADMIN';
    }

    public function isMod()
    {
        return $this->role->name === 'MODERATOR';
    }

    public function isUser()
    {
        return $this->role->name === 'USER';
    }

    public function statuses()
    {
        return $this->belongsToMany(Status::class, 'user_statuses');
    }

    public function getUserSquad($userId)
    {
        $squad = DB::table('squad_members')->where('user_id', $userId)->first();

        if (!empty($squad))

            return DB::table('squads')->where('id', $squad->squad_id)->first();
    }

    public function isLeader()
    {
        $squad = DB::table('squad_members')->where('user_id', $this->id)->first();

        if ($squad->role_id === 1 || $squad->role_id === 2) {
            return true;
        }
        return false;
    }

    public function isBanned()
    {
        foreach ($this->statuses as $status) {
            if ($status->name === "BANNED") {
                return true;
            }
        }
        return false;
    }

    public function isFlagged()
    {
        foreach ($this->statuses as $status) {
            if ($status->name === "FLAGGED") {
                return true;
            }
        }
        return false;
    }

    public function isMuted()
    {
        foreach ($this->statuses as $status) {
            if ($status->name === "MUTED") {
                return true;
            }
        }
        return false;
    }

}
