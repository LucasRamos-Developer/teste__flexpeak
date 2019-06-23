<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'name',
        'birth_date',
        'address_street',
        'address_number',
        'address_neighborhood',
        'address_city',
        'address_state',
        'address_zipcode',
        'course_id'
    ];
    
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
