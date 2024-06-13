<h2>{{$job->title}}</h2>

<p>
    Congrats! Your job is now live on our site!
</p>

<p>
    {{-- We have to use url so the full site url will appear in the user's email --}}
    <a href="{{url('/job/' . $job->id)}}">View your job listing!</a>
</p>