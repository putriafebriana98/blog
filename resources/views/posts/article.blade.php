<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/posts/{{$post->id}}">
        {{$post->title}}</h2>
    </a>
    <p class="blog-post-meta">{{$post->created_at->toDayDateTimeString()}} by <a href="#">Putria Febriana</a></p>

    <p>{{$post->body}} </p>
</div><!-- /.blog-post -->

    {{--<p>I try to apply a lot of job from internet, why I need to change my job: </p>
    <ul>
        <li>I want to be a developer, not tester</li>
        <li>I am boring with my current company</li>
        <li>It's really hard to get a job and I must consider as well my resident permit</li>
    </ul>
</div>--}}
