@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Event</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-inline">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('event.update', $event -> id)}}" method="POST">

        @csrf
        @method('PUT')

        <label for="name">Name</label>
        <br>
        <input type="text" name="name" value="{{ $event -> name }}">
        <br><br>

        <label for="description">Description</label>
        <br>
        <input type="textarea" name="description" value="{{ $event -> description }}">
        <br><br>

        <label for="date">Date</label>
        <br>
        <input type="date" name="date" value="{{ $event -> date }}">
        <br><br>

        <label for="location">Location</label>
        <br>
        <input type="text" name="location" value="{{ $event -> location }}">
        <br><br>

        <label for="user_id">User: {{ $event -> user -> name }}</label>
        <br><br>

        <label>Tags</label><br>
        @foreach($tags as $tag)
            <div>
                <input type="checkbox" name="tag_id[]" value="{{ $tag->id }}" id="{{"tag" . $tag -> id}}" 
                @foreach ($event -> tags as $eventTag)
                    @if($eventTag -> id == $tag -> id)
                    checked
                    @endif
                @endforeach
                <label for="tag {{$tag -> id }}"> {{$tag -> name}}</label>
            </div>
        @endforeach   
        <br><br>
        <input type="submit" value="UPDATE">
    </form>
</div>
   
@endsection