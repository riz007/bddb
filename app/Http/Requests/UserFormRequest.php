<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required',
            'spouse_name'       => 'required',
            'position'          => 'required',
            'organization'      => 'required',
            'business_address',
            'residence_address',
            'permanent_address' => 'required',
            'phone',
            'mobile_number'     => 'required',
            'email'             => 'required',
            'years'             => 'required',
            'facebook',
            'viber',
            'line',
            'skype',
            'feedback',
            'image',
            'passport_number'   => 'required',
            'date'              => 'required'
        ];
    }
}
