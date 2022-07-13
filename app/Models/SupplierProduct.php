<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class SupplierProduct extends BaseModel
{
    use HasFactory;

    public function Product()
    {

        return $this->belongsTo('App\Models\Product', 'product_id');
    }
    public function Supplier()
    {

        return $this->belongsTo('App\Models\Supplier', 'supplier_id');
    }
}
