<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SubCategory extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'sub_category';
    
    protected $fillable = [
        'category_id','sub_category_name','status'
    ];
}
