<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Get the poster of the post.
     */
    public function poster() {
        return $this->belongsTo('App\User', 'poster_id');
    }

    /**
     * Get the poster of the post.
     */
    public function thread() {
        return $this->belongsTo('App\Thread');
    }
}
