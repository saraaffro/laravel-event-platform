@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mt-3 mb-5">{{ $event -> name }}</h1>
    
    <p>{{ $event -> description }}</p>
    <p>{{ $event -> date }}</p>
    <p>{{ $event -> location }}</p>
    <p>By {{$event -> user -> name }}</p>
                
    <h5>Tags:</h5>
        @foreach ($event->tags as $tag)
            <em>{{ $tag->name }}</em>
            <br>
        @endforeach
</div>
   
@endsection