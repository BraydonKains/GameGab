@extends('layouts.app')

@section('content')
<div id="app">
    <div class="container">
    <div>
@guest
        <thread-collection with=false></thread-collection>
@else
        <thread-collection user_id="{{ Auth::user()->id }}" with=true></thread-collection>
@endguest
    </div>
    </div>
</div>
@endsection