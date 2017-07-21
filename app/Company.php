<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use Notifiable;

    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_name', 'owner_name', 'email', 'password', 'api_token', 'classification_id', 'city_id', 'logo', 'phone', 'street', 'founded_at', 'premium'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token',
    ];

    public function ads(){
        return $this->morphMany('App\Ad', 'account');
    }

    public function rates(){
        return $this->hasMany('App\Rate');
    }


    public function city(){
        return $this->belongsTo('App\City');
    }
}
