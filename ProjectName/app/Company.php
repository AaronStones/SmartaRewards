<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['company', 'uuid'];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    function mycmp()
    {
        return $this->hasMany('App\companyNotes');
    }
}

?>
