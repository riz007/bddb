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
            'name'          => 'required',
            'spouse_name'          => 'required',
            'position'          => 'required',
            'organization'          => 'required',
            'business_address'          => 'required',
            'residence_address'          => 'required',
            'permanent_address'          => 'required',
            'phone'          => 'required',
            'mobile_number'          => 'required',
            'email'          => 'required',
            'years'          => 'required',
            'facebook'          => 'required',
            'viber'          => 'required',
            'line'          => 'required',
            'skype'          => 'required',
            'feedback'          => 'required',
            'image'          => 'required',
            'passport_number'          => 'required',
            'date' => 'required'
        ];
    }
}
