@props(['post'])

<article class="brick entry" data-aos="fade-up">

    <div class="entry__thumb">
        <a href="#" class="thumb-link">
            <img src="{{ getImage($post, true) }}" alt="" style="width:100%">
        </a>
    </div>

    <div class="entry__text">
        <div class="entry__header">
            <h2 class="entry__title"><a href="{{ route('detail', $post->id) }}">{{ $post->title }}</a></h2>
            <div class="entry__meta">
                <span class="byline"">@lang('By:')
                    <span class='author'>
                        {{ $post->users->name }}
                </span>
                </span>
            </div>
        </div>
        <a class=" entry__more-link" href="{{ route('detail', $post->id) }}">@lang('Look at')</a>
            </div>

</article>