<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billas extends Model
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
    public function products()
    {
        return $this->hasMany(Products::class);
    }

    protected $fillable = [
        'name', 'datetime' ,'trucks_id', 'mechanics_id'  , 'drivers_id'  
        ,'products_id' , 'total'
    ];
}
