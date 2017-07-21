<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favourite extends Model
{
    use SoftDeletes;

    protected $table = 'favourite';

    protected $fillable = [
        'account_id', 'account_type', 'favourite_id', 'favourite_type',
    ];

    protected $dates = [
        'deleted_at'
    ];


    public function favourite(){
        return $this->morphTo();
    }
}
