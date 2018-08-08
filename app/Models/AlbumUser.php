<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumUser extends Model
{

    protected $table = "album_users";
    protected $primaryKey = "id";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'avatar',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
