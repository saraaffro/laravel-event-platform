@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Events:</h1>
    <a class="event" href="{{ route('event.create') }}">CREATE NEW EVENT</a>
    <ul>
        @foreach ($events as $event)
            <li>
                <a href="{{ route('event.show', $event -> id)}}">{{ $event -> name }}</a>
                <a class="edit ms-2" href="#">EDIT</a>
                <form class=" d-inline-block" action="{{route('event.delete', $event)}}" method="POST">
                    @csrf
                    @method('DELETE')

                    <input class="delete" type="submit" value="DELETE">
                </form>
                
                <br><br>
            </li>            
        @endforeach
    </ul>
</div>
   
@endsection