<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Builder;

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

    public function scopeFilter(Builder $builder, $request)
    {
        return (new ProductFilter($request))->filter($builder);
    }
}
