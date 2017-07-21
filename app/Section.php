<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Section extends Model
{
    use SoftDeletes;

    protected $table = 'sections';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
    ];

    public function contact(){
        return $this->hasMany('App\Contact');
    }

    public function ads(){
        return $this->hasMany('App\Ad');
    }

    protected $hidden = [
        'deleted_at',
    ];
}
