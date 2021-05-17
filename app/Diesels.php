<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diesels extends Model
{
    protected $fillable = [
        'name', 'price' , 'amount' , 'sum' , 'unit'  
    ];
}
