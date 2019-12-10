<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserForm extends Model
{
    protected $fillable= ['name','spouse_name','position','organization',
    'business_address','residence_address','permanent_address',
    'phone','mobile_number','email','years','facebook','viber','line','skype','feedback',
    'image','passport_number', 'date'];

    protected $table = "user_form";
}
