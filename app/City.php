<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $table = 'cities';

    public function governorate(){
        return $this->belongsTo('App\Governorate');
    }

    protected $fillable = [
        'name', 'governorate_id',
    ];

    protected $hidden = [
        'deleted_at',
    ];
}
