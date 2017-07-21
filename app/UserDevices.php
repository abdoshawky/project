<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDevices extends Model
{
    protected $table = 'user_devices';

    protected $fillable = [
        'account_type', 'account_id', 'player_id'
    ];
}
