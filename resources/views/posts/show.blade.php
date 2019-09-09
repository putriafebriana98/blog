@extends('layouts.master')
@section('content')
       {{-- @include('posts.article')--}}
       <h1>{{$post->title}}</h1>
       <p>{{$post->body}}</p>
    <nav>
        <ul class="pager">
            <li><a href="#">Previous</a></li>
            <li><a href="#">Next</a></li>
        </ul>
    </nav>


@endsection
