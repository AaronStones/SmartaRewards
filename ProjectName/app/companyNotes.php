<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companyNotes extends Model
{
    protected $table ="company_notes";

    protected $fillable = ['note', 'company_id'];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
