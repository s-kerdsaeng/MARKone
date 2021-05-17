<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teaks extends Model
{
    protected $fillable = [
        'name', 'price' , 'amount' , 'unit'
    ];
}
