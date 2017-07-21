<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rate extends Model
{
    use SoftDeletes;

    protected $table = 'rates';

    protected $fillable = [
        'user_id', 'company_id', 'commitment', 'prices', 'quality', 'accuracy', 'honesty', 'comment',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function getTotalRateAttribute($value){
        return $this->attributes['commitment'] + $this->attributes['prices'] + $this->attributes['quality'] + $this->attributes['accuracy'] +$this->attributes['honesty'];
    }
}
