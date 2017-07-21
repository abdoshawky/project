<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Ad extends Model
{
    use SoftDeletes;

    protected $table = 'ads';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'section_id', 'type_id', 'city_id', 'account_id', 'account_type', 'address', 'longitude', 'latitude',
        'area', 'm_price', 'price', 'title', 'details', 'phone', 'media', 'premium',
    ];

    protected $hidden = [

    ];

    public function account(){
        return $this->morphTo();
    }

    public function section(){
        return $this->belongsTo('App\Section');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }

    public function type(){
        return $this->belongsTo('App\Type');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }


}
