<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Measure extends Model
{
    protected $fillable = [
        'measure_name'
    ];

    public function setMeasureNameAttribute($value)
    {
        $this->attributes['measure_name'] = ucwords(strtolower(strip_tags($value)));
    }

    public function getCreatedAtAttribute($value)
    {
        return new Date($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return new Date($value);
    }
}
