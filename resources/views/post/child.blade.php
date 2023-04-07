@foreach ($posts as $post)
    <article>
        <h2>{{$post->title}}</h2>
        <img src="{{$post->image}}" alt="{{$post->title}}">
    </article>

@endforeach
