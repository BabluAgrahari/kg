<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class State extends BaseModel
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'state';

    protected $fillable = [
        'state_name', 'status'
    ];
}
