<?php

namespace App\Exports;

use App\UserForm;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserFromExport implements FromCollection
{
    public function collection()
    {
        $heading =['name','spouse_name','position','organization',
        'business_address','residence_address','permanent_address',
        'phone','mobile_number','email','years','facebook','viber','line','skype','feedback',
        'image','passport_number', 'date'];
        return UserForm::all()->prepend($heading);
    }
}