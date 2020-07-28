<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['name','designation','company_id'];

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
