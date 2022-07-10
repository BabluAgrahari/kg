<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function categoryName(){

        return $this->belongsTo('App\Models\Category','category_id');
    }
    public function subCategoryName(){

        return $this->belongsTo('App\Models\SubCategory','sub_category_id');
    }
    public function brandName(){

        return $this->belongsTo('App\Models\Brand','brand_id');
    }
    public function unitName(){

        return $this->belongsTo('App\Models\Unit','unit_id');
    }
}
