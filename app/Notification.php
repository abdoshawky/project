<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use SoftDeletes;

    protected $table = 'notifications';

    protected $fillable = [
        'type', 'send_from_id', 'send_from_type', 'send_to_id', 'send_to_type', 'content', 'seen',
    ];

    protected $hidden = [
        'deleted_at',
    ];

    protected $dates = [
        'deleted_at',
    ];
}
