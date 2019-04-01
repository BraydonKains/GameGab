<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * Get threads that have this tag.
     */
    public function threads() {
        return $this->belongsToMany('App\Thread');
    }

    /**
     * Get creator of this tag.
     */
    public function creator() {
        return $this->belongsTo('App\User', 'creator_id');
    }
}
