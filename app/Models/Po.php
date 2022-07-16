<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Po extends BaseModel
{
    use HasFactory;

    public function Supplier()
    {
        return $this->hasOne('App\Models\Supplier', '_id', 'supplier_id')->select('store_name');
    }
}
