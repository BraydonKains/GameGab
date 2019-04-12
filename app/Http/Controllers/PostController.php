<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Resources\PostCollection;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Thread $post)
    {
        return view("create_post")->withThread($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("edit_post")->withPost($post);
    }

    /**
     * Show the posts for a certain thread.
     * 
     * @param int $thread
     */
    public function show(int $thread_id) {
        $posts = new PostCollection(Post::with("poster")->get()->where("thread_id", $thread_id));
//dd($posts);
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        $post->poster_id = $request->user_id;
        $post->content = $request->content;
        $post->thread_id = $request->thread_id;

        $post->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->content = $request->content;

        $post->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Post::find($id)->delete();
    }
}
