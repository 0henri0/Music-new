<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    protected $primaryKey = "id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'date_of_birth', 'introduction', 'role', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'follow_user', 'user_ed_id', 'user_ing_id');
    }
    public function songs()
    {
        return $this->belongsToMany('App\Models\Song', 'rates', 'user_id', 'song_id');
    }
    public function singers()
    {
        return $this->belongsToMany('App\Models\Singer', 'follow_singer', 'user_id', 'singer_id');
    }
    public function albumUser()
    {
        return $this->hasMany('App\Models\AlbumUser');
    }
    public function song()
    {
        return $this->hasMany('App\Models\Song');
    }
}
