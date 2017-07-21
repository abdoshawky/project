<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountSettings extends Model
{
    protected $table = 'account_settings';

    protected $fillable = [
        'account_id', 'account_type', 'notifications', 'voice', 'vibration'
    ];
}
