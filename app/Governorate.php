<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Governorate extends Model
{
    use SoftDeletes;

    protected $table = 'governorates';

    public function cities(){
        return $this->hasMany('App\City');
    }

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'deleted_at',
    ];
}
