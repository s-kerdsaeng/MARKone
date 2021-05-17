<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billdetails extends Model
{
    public function products()
    {
        return $this->hasMany(Products::class);
    }
    public function billbs()
    {
        return $this->hasMany(Billbs::class);
    }
    protected $guarded = [];
}
