@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Event: {{ $event -> name }}</h1>
    
    <h2>name: {{ $event -> name }}</h2>
    <p>description: {{ $event -> description }}</p>
    <p>date: {{ $event -> date }}</p>
    <p>location: {{ $event -> location }}</p>
                
                
</div>
   
@endsection