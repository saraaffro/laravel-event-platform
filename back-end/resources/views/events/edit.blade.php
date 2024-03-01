@extends('layouts.app')
@section('content')
<div class="container">
    <h1>EDIT EVENT</h1>
    <form action="{{ route('event.update', $event -> id)}}" method="POST">

        @csrf
        @method('PUT')

        <label for="name">Name</label>
        <br>
        <input type="text" name="name" value="{{ $event -> name }}">
        <br><br>

        <label for="description">Description</label>
        <br>
        <input type="text" name="description" value="{{ $event -> description }}">
        <br><br>

        <label for="date">Date</label>
        <br>
        <input type="text" name="date" value="{{ $event -> date }}">
        <br><br>

        <label for="location">Location</label>
        <br>
        <input type="text" name="location" value="{{ $event -> location }}">
        <br><br>

        <label>Tags</label><br>   
        @foreach ($event -> tags as $tag)
        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
            {{-- se il tag nell'evento contiene l'id del tag allora flaggalo --}}
            {{ $event->tags->contains($tag->id) ? 'checked' : '' }}>
            <label>{{ $tag->name }}</label><br>
        @endforeach
        <br><br>
        <input type="submit" value="UPDATE">
    </form>
</div>
   
@endsection