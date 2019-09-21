<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="/">Home</a>
            <a class="blog-nav-item" href="/posts/create">Post Something</a>
            <a class="blog-nav-item" href="#">Job Wanted</a>
            <a class="blog-nav-item" href="#">Learning</a>
            @if(Auth::check())
                <a class="user">Hi, {{Auth::user()->name}}</a>
                <a class="user" style="background-color: white;margin-left: 0px" href="/logout">Logout</a>
            @else
                <a class="user" style="background-color: white;margin-left: 0px" href="/login">login</a>
                <a class="user" style="background-color: white;margin-left: 0px" href="/register">register</a>
            @endif
        </nav>

    </div>

</div>
