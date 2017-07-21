<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Classification extends Model
{
    use SoftDeletes;

    protected $table = 'classifications';

    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'name',
    ];

    public function companies(){
        return $this->hasMany('App\Company');
    }
}
