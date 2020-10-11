<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $table = 'employees';
    protected $fillable = ['firstname', 'lastname', 'email', 'hobbies', 'gender', 'upload_ilmage'];
}
