<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = [
      'name', 'type', 'email', 'age', 'section_id', 'title', 'details', 'phone'
    ];

    public function section(){
        return $this->belongsTo('App\Section');
    }


}
