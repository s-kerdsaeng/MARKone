<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teakdetails extends Model
{
    protected $fillable = [
        'teaks_id', 'name', 'amount' , 'status' , 'datetime' 
    ];

}
