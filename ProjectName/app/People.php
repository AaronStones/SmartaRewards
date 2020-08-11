<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['name', 'email'];

    protected $rules = [
        'email_address' => 'required|email|unique:users'
    ];

}
