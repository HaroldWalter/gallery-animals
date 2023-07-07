@extends('layouts.layouthf')

@section('main')

@if(isset($title))
<div class="row">
    <div class="column">
        <h1>{!! $title !!}</h1>
    </div>
</div>
@else
<div class="row">
    <div class="column">
        <h1>Walter & Animaux</h1>
    </div>
</div>
@endisset

<div class="s-bricks">

    <div class="masonry">
        <div class="bricks-wrapper h-group">

            <div class="grid-sizer"></div>

            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>

            @foreach($posts as $post)

            <x-post.brick :post="$post" />

            @endforeach

        </div>

    </div>

    <div class="row">
        <div class="column large-12">
            {{ $posts->links('post.pagination') }}
        </div>
    </div>

</div>

@endsection