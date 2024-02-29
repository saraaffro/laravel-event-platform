@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Event: {{ $event -> name }}</h1>
    
    <h2>Name: {{ $event -> name }}</h2>
    <p>Description: {{ $event -> description }}</p>
    <p>Date: {{ $event -> date }}</p>
    <p>Location: {{ $event -> location }}</p>
                
    <h2>Tags:</h2>
        @foreach ($event->tags as $tag)
            <em>{{ $tag->name }}</em><br>
        @endforeach
</div>
   
@endsection