<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'user_id', 'photo', 'species_id', 'age', 'gender_id', 'location', 'status_id', 'expires_in',
    ];

    function user(){
        return $this->belongsTo('App\User');
    }

    function gender()
    {
        return $this->belongsTo('App\Gender');

    }

    function species()
    {
        return $this->belongsTo('App\Species');
    }

    function status()
    {
        return $this->belongsTo('App\AnimalStatus');
    }


    function comments()
    {
        return $this->hasMany('App\Comment');
    }



}
