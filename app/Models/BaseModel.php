<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        self::observe(\App\Observers\AttachTimeStamp::class);
    }

     public function dFormat($date){

	if(empty($date))
		return false;

     return date('d M Y',$date);
    }
}
