<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = ['name','address'];

    protected $with = ['employees'];


    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
