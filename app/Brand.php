<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['brand_name'];

    public function setBrandNameAttribute($value)
    {
        $this->attributes['brand_name'] = ucwords(strtolower(strip_tags($value)));
    }
}
