@extends('layouts.app')
@section('content')
<div class="container">
    <h1>NEW EVENT</h1>
    <form action="{{ route('event.store')}}" method="POST">

        @csrf
        @method('POST')

        <label for="name">Name</label>
        <br>
        <input type="text" name="name">
        <br><br>

        <label for="description">Description</label>
        <br>
        <input type="text" name="description">
        <br><br>

        <label for="date">Date</label>
        <br>
        <input type="text" name="date">
        <br><br>

        <label for="location">Location</label>
        <br>
        <input type="text" name="location">
        <br><br>

        <input type="submit" value="CREATE">
    </form>
</div>
   
@endsection