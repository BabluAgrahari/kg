<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class UserDetails extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'user_details';
    
    protected $fillable = [
        'userType', 'store_owner','business_email','gst_no','phone','mobile','country','state','city','pincode','logo','store_cover_photo','store_address','store_description','status','verified_store','gst_certificate','u_a_msme_certificate','shop_licence','trade_licence','fssai_registration','drug_licence','current_account_cheque'
    ];
}
