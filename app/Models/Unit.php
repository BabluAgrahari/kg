<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Unit extends BaseModel
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'unit';

    protected $fillable = [
        'unit_name', 'status'
    ];
}
