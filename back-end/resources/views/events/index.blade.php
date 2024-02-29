@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Events:</h1>
    <ul>
        @foreach ($events as $event)
            <li>
                name: <strong>{{ $event -> name }}</strong><br>
                description: {{ $event -> description }} <br>
                date: {{ $event -> date }} <br>
                location: {{ $event -> location }}
                <br><br>
            </li>            
        @endforeach
    </ul>
</div>
   
@endsection