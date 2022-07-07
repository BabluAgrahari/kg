<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Brand extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'brand';
    
    protected $fillable = [
        'brand_name', 'status'
    ];
}
 