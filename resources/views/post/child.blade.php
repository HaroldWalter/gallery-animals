<div class="grid gap-4 grd-cols-3">
@foreach ($posts as $post)
    <article class="flex-1 max-w-sm">
        <h2>{{$post->title}}</h2>
        
        <img class="object-scale-down" src="{{$post->image}}" alt="{{$post->title}}">
        <a href="/detail/{{$post->id}}"> Voir</a>
    </article>

@endforeach
</div>