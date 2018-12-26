<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable =[
        'name','phone_number','email','roll','reg_id','department_id','classe_id','father_name','mother_name',
        'present_address','permanent_address','home_number',
    ];
}
