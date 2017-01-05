<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Warehouse extends Model
{
    protected $fillable = [
        'warehouse_name',
        'warehouse_description',
        'warehouse_status'
    ];

    public function setWarehouseNameAttribute($value)
    {
        $this->attributes['warehouse_name'] = ucwords(strtolower(strip_tags($value)));
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
