<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];
    public function category()
    {
        return $this->hasMany('App\Models\Category', 'category_id');
    }
    public function singer()
    {
        return $this->hasMany('App\Models\Singer', 'singer_id');
    }
}
