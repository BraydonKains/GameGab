<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //

    /**
     * Get the creator of the thread.
     */
    public function creator() {
        return $this->belongsTo('App\User', 'thread_creator_id');
    }

    /**
     * Get the tags for the thread.
     */
    public function tags() {
        return $this->belongsToMany('App\Tag');
    }
}
