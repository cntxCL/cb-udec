<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function personal()
    {
        return $this->belongsTo('App\Personal','personal_id');
    }

    public function logs()
    {
        return $this->hasMany('App\Log');
    }

    public function notifications_unreaded()
    {
        return $this->hasMany('App\Notification')->where('viewed','=',0);
    }

    public function notifications()
    {
        return $this->hasMany('App\Notification')->orderBy('created_at', 'desc')->limit(20);
    }

}
