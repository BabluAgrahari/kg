<?php

use App\Models\EmployeeCommission;
use App\Models\Outlet;
use App\Models\TransferHistory;
use App\Models\User;
use App\Models\Webhook;
use Illuminate\Support\Facades\Auth;
use Ixudra\Curl\Facades\Curl;

if (!function_exists('uniqCode')) {
    function uniqCode($lenght)
    {
        // uniqCode
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return strtoupper(substr(bin2hex($bytes), 0, $lenght));
    }
}


if (!function_exists('singleFile')) {

    function singleFile($file, $folder)
    {
        if ($file) {
            if (!file_exists($folder))
                mkdir($folder, 0777, true);

            $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move(public_path() . '/' . $folder, $filename);
            return $filename;
        }
        return false;
    }
}


if (!function_exists('multipleFile')) {

    function multipleFile($files, $folder)
    {

        $fileNames = [];
        foreach ($files as $key=>$file) {
            if ($file) {
                if (!file_exists($folder))
                    mkdir($folder, 0777, true);

                $filename = date('YmdHis') . "." . $file->getClientOriginalExtension();
                $file->move(public_path() . '/' . $folder, $filename);
                $fileNames[$key] =  $filename;
            }
        }

        return $fileNames;
    }
}


if (!function_exists('pr')) {
    function pr($data)
    {
        echo "<pre>";
        print_r($data);
        echo '</pre>';
        die;
    }
}


if (!function_exists('profileImage')) {

    function profileImage()
    {
        $outlet_id = Auth::user()->outlet_id;
        $outlet = Outlet::select('profile_image')->find($outlet_id);
        return (!empty($outlet->profile_image)) ? asset('attachment') . '/' . $outlet->profile_image : asset('assets/profile/37.jpg');
    }
}
