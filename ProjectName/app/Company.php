<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company', 'uuid'];

    protected $rules = [
        'email_address' => 'required|company|unique:users'
    ];
}

?>
