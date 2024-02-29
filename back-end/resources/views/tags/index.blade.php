@extends('layouts.app')
@section('content')

<div class="container">
<h1>Tags</h1>

<ul>
    @foreach ($tags as $tag)
    <li>
        {{$tag -> name}}
        {{$tag -> category}}
    </li>
    @endforeach
</ul>
</div>
@endsection