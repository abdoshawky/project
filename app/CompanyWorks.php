<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyWorks extends Model
{
    use SoftDeletes;

    protected $table = 'company_works';

    protected $fillable = [
        'company_id', 'type', 'src',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function getSrcAttribute($value){
        return url('images/normal/'.$this->attributes['src']);
    }

}
