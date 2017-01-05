<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Category extends Model
{
    protected $fillable = [
        'category_name',
        'category_description'
    ];

    public function setCategoryNameAttribute($value)
    {
        $this->attributes['category_name'] = ucwords(strtolower(strip_tags($value)));
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
