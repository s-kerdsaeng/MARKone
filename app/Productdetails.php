<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productdetails extends Model
{
    public function products()
    {
    	return $this->hasOne(Products::class);
    }
    public function billbs()
    {
        return $this->hasMany(Billbs::class);
    }
    /* protected $fillable = [
        'billdetail_id','product_id', 'datetime' ,'trucks_id', 'mechanics_id'  , 'drivers_id'  , 'total'
    ]; */
    protected $guarded = [];
}
