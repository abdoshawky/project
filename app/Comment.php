<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'user_id', 'ad_id', 'comment',
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $hidden = [
       'deleted_at',
    ];

    public function ad(){
        return $this->belongsTo('App\Ad');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
