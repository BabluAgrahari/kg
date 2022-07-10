<?php

namespace App\Http\Validation;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class ProductValidation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'store_owner'               => 'required',
            'store_name'                => 'required',
            'business_email'            => 'required|email',
            'gst_no'                    => 'required',
            'phone'                     => 'required|digits:10',
            'mobile'                    => 'required|digits:10',
            'country'                   => 'required',
            'state'                     => 'required',
            'city'                      => 'required',
            'pincode'                   => 'required|digits:6',
            'store_address'             => 'required',
            'store_description'         => 'required|max:100',
            'logo'                      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
        ];
    }
    // public function messages()
    // {
    //     return [
    //         'retailer_name.required' => 'Retailer Name field is Required.',
    //         'retailer_name.string'=>'Retailer Name should be string.',
    //         'retailer_name.max'=>'Retailer Name should not be maximum 30 Character.',
    //         'mobile_no.required'=>'Mobile Number field is Required.',
    //     ];
    // }

    protected function failedValidation(Validator $validator)
    {
        // throw new HttpResponseException();
        throw new HttpResponseException(response(json_encode(array('validation' => $validator->errors()))));
    }
}
