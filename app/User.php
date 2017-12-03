<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getStartTimeFormatAttribute()
    {   // remove the last part (seconds)
        $parts = explode(':', $this->start_time);
        return $parts[0] . ':' . $parts[1];
    }

    public function getEndTimeFormatAttribute()
    {   // remove the last part (seconds)
        $parts = explode(':', $this->end_time);
        return $parts[0] . ':' . $parts[1];
    }
}
