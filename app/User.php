<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password', 'api_token', 'city_id', 'phone', 'age', 'gender', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token', 'deleted_at', 'city_id'
    ];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    public function city(){
        return $this->belongsTo('App\City');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function ads(){
        return $this->morphMany('App\Ad', 'account');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function getNameAttribute($value){
        return $this->attributes['firstname'].' '.$this->attributes['lastname'];
    }
}
