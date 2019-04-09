<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ThreadsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
        ];
    }

    /**
     * Deprecated, kept for posterity.
     */
    public function getCreators() {
        foreach($this->collection as &$t) {
            $creator = $t->creator;
            //dd($creator->name);
            $t->creator_name = $creator->name;
        }
        dd($this->collection);
    }
}
