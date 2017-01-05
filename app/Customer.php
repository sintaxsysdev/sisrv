<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Customer extends Model
{
    protected $fillable = [
        'customer_ruc_dni',
        'customer_businessname',
        'customer_phone',
        'customer_email',
        'customer_address',
        'customer_city',
        'customer_observation'
    ];

    public function setCustomerBusinessnameAttribute($value)
    {
        $this->attributes['customer_businessname'] = ucwords(strtolower(strip_tags($value)));
    }

    public function setCustomerAddressAttribute($value)
    {
        $this->attributes['customer_address'] = ucwords(strtolower(strip_tags($value)));
    }

    public function setCustomerCityAttribute($value)
    {
        $this->attributes['customer_city'] = ucwords(strtolower(strip_tags($value)));
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
