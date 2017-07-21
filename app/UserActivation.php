<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserActivation extends Model
{
    protected $table = 'user_activation';

    protected $fillable = [
        'activation_code', 'account_type', 'account_id', 'type',
    ];
}
