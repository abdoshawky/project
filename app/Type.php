<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;

    protected $table = 'types';

    protected $fillable = [
        'name',
    ];

    protected $dates = [
        'deleted_at',
    ];

    protected $hidden = [
        'deleted_at',
    ];


}
