<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Http\Resources\ThreadsCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ThreadsCollection(Thread::with("creator")->get()->sortByDesc('created_at'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create_thread");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thread = new Thread;
        
        $thread->thread_title = $request->thread_title;
        $thread->thread_poster_id = $request->user_id;

        $thread->save();
    }

    /**
     * Display the specified resource.
     *
     * @param integer $id
     *  - A thread ID
     * @return \Illuminate\Http\Response
     */
    public function show(integer $id)
    {
        $thread = ThreadsCollection(Thread::find($id)->with("posts")->get());
        return view("thread_view")->withThread($thread);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view("edit")->withThread($thread);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        $thread->thread_title = $request->thread_title;
        $thread->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
