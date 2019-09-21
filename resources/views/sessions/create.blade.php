@extends('layouts.master')
@section('content')
    <h2>Sign in</h2>
    <form method="post" action="/login">
        {{csrf_field()}}
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" id="email" name="email"/>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Sign in</button>
            <a type="button" class="btn btn-primary" href="{{url('/register')}}">register</a>
        </div>
        @include('layouts.errors')
    </form>
@endsection
