<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Supplier extends Model
{
    protected $fillable = [
        'supplier_ruc',
        'supplier_businessname',
        'supplier_legaladdress',
        'supplier_city',
        'supplier_phone',
        'supplier_email',
        'supplier_observation'
    ];

    public function setSupplierBusinessnameAttribute($value)
    {
        $this->attributes['supplier_businessname'] = ucwords(strtolower(strip_tags($value)));
    }

    public function setSupplierLegaladdressAttribute($value)
    {
        $this->attributes['supplier_legaladdress'] = ucwords(strtolower(strip_tags($value)));
    }

    public function setSupplierCityAttribute($value)
    {
        $this->attributes['supplier_city'] = ucwords(strtolower(strip_tags($value)));
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
