@extends('layouts.app')
@section('content')

<div class="container">
    <h1 class="mt-3 text-center">Events</h1>
    @auth
        <div class="text-end mt-2 mb-4">
            <a class="event" href="{{ route('event.create') }}">CREATE NEW EVENT</a>
        </div>
    @endauth
   <div class="row d-flex gy-4">
        @foreach ($events as $event)
            <div class="col-4">
                <div class="card">
                    <a href="{{ route('event.show', $event -> id)}}">
                        <h5>{{ $event -> name }}</h5>
                        <p class="mt-2">{{ $event -> description }}</p>
                        <p>{{ $event -> date }}</p>
                    </a> 

                    @auth
                        @if (auth() -> user() -> id == $event -> user_id)
                        <div class="mt-3 d-flex">
                            <a class="edit me-2" href="{{ route('event.edit', $event->id) }}">Edit</a>
                            
                            <form action="{{ route('event.delete', $event) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input class="delete" type="submit" value="Delete">
                            </form> 
                        </div>
                        @endif
                    @endauth
                </div>   
            </div>
        @endforeach
   </div>
</div>
@endsection