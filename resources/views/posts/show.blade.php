@extends('layouts.master')
@section('content')
    {{-- @include('posts.article')--}}
    <p>Post ID: {{$post->id}}</p>
    <h1> {{$post->title}}</h1>

    @if(count($post->tags))
    <ul>
        @foreach($post->tags as $tag)
            <li>
                <a href="/posts/tags/{{$tag->name}}">{{$tag->name}}
                </a>
            </li>
        @endforeach
    </ul>
    @endif

    <p>{{$post->body}}</p>
    <hr>
    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    <strong>
                        {{$comment->created_at->diffForHumans()}};&nbsp;
                    </strong>
                    {{$comment->body}}
                </li>
            @endforeach
        </ul>
    </div>
    <hr>
    <div class="card">
        <div class="card-block">
            <form method="POST" action="/posts/{{$post->id}}/comments">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea name="body" placeholder="Place Your Comment here!" class="form-control"
                              required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </div>
            </form>
            @include('layouts.errors')
        </div>
    </div>
    <nav>
        <div class="parent">


            @if ($post->id == 1 || $post->id == $post::count())
                @php
                    $post->id = 2;
                @endphp
            @endif


            <a href="{{route('posts', ['id' => $post->id-1])}}">&lt;Previous</a>
            <a href="/">Home</a>
            <a href="{{route('posts', ['id' =>$post->id+1])}}">Next&gt;</a>

        </div>
    </nav>
@endsection
