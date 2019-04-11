@extends('layouts.app')

@section('content') 
<div class="app">
    <div class="container">
@guest
        <thread-view thread_id="<?php echo $thread_id; ?>" with="false"> 
@else
        <thread-view user_id="{{ Auth::user()->id }}" thread_id="<?php echo $thread_id; ?>" with="true">
@endguest
    </div>
</div>
@endsection