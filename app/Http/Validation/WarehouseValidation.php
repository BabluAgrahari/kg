<?php

namespace App\Http\Validation;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class WarehouseValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'users'                  => 'required',
            'store_name'             => 'required|string|max:100',
            'store_email'            => 'required|email|max:100',
            'gst_no'                 => 'nullable|max:50',
            'store_mobile'           => 'required|numeric|not_in:0|digits:10',
            'country'                => 'nullable|max:16|min:6',
            'state'                  => 'required',
            'city'                   => 'required',
            'pincode'                => 'required|digits:6',
            'store_address'          => 'required',
            // 'profile_image'          => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // throw new HttpResponseException();
        throw new HttpResponseException(response(json_encode(array('validation' => $validator->errors()))));
    }
}