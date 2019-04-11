@extends('layouts.app')

@section('content') 
<div class="app">
    <div class="container">
        <thread-view thread_id="<?php echo $thread_id; ?>">
    </div>
</div>
@endsection