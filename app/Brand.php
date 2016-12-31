<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Brand extends Model
{
    protected $fillable = ['brand_name'];

    public function setBrandNameAttribute($value)
    {
        $this->attributes['brand_name'] = ucwords(strtolower(strip_tags($value)));
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
