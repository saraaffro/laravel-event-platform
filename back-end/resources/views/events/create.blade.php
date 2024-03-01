@extends('layouts.app')
@section('content')
<div class="container">
    <h1>NEW EVENT</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-inline">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('event.store')}}" method="POST">

        @csrf
        @method('POST')

        <label for="name">Name</label>
        <br>
        <input type="text" name="name">
        <br><br>

        <label for="description">Description</label>
        <br>
        <input type="textarea" name="description">
        <br><br>

        <label for="date">Date</label>
        <br>
        <input type="date" name="date">
        <br><br>

        <label for="location">Location</label>
        <br>
        <input type="text" name="location">
        <br><br>

        <label for="user_id">User: {{ auth() -> user() -> name }} </label>
        <br>
        <br><br>

        <label>Tags:</label>
        <br>
        @foreach ($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{$tag ->id}}" id="tag{{$tag ->id}}">
            <em>{{ $tag->name }}</em><br>
        @endforeach
        <br><br>

        <input type="submit" value="CREATE">
    </form>
</div>
   
@endsection