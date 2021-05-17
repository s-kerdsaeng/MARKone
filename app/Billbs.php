<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billbs extends Model
{
    public function trucks()
    {
    	return $this->hasOne(Trucks::class);
    }
    public function mechanics()
    {
    	return $this->hasOne(Mechanics::class);
    }
    public function drivers()
    {
    	return $this->hasOne(Drivers::class);
    }
    public function billdetails()
    {
        return $this->hasMany(Billdetails::class);
    }
    public function productdetails()
    {
        return $this->hasMany(Productdetails::class);
    }

    protected $fillable = [
        'name', 'datetime' ,'trucks_id', 'mechanics_id'  , 'drivers_id'  , 'total'
    ];
}
