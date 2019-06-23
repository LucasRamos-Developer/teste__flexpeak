<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name',
        'birth_date'
    ];

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

}
