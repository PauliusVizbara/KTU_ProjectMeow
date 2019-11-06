<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text', 'user_id', 'animal_id', 'comment_id', 'author_id'
    ];

    function user()
    {
        return $this->belongsTo('App\User');
    }

    function author()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }
    function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    function animal()
    {
        return $this->belongsTo('App\Gender');
    }

}
