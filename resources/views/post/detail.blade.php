@extends('layouts.layouthf')

@section('main')

<!-- post
================================================== -->
<div class="row">
   <div class="column large-12">

      <article class="s-content__entry format-standard">


         <div class="s-content__entry-header">
            <h1 class="s-content__title s-content__title--post">{{ $post->title }}</h1>
         </div>
         <section class="row">
            <div class="column large-10">
               <div class="s-content__media">
                  <div class="s-content__post-thumb">
                     <img src="{{ getImage($post) }}" alt="{{$post->title}}" style="width:100%">
                  </div>
               </div>
            </div>


            <div class="column large-2">

               <div class="s-content__entry-meta">


                  @isset($post->datePhoto)
                  <div class="meta-blk">
                     <span>@lang('Taken On')</span>
                     {{ $post->datePhoto->format('d-m-Y') }}
                  </div>
                  @endisset

                  @isset($post->lieuPhoto)
                  <div class="meta-blk">
                     <span>@lang('Taken at')</span>
                     {{ $post->lieuPhoto }}
                  </div>
                  @endisset

                  <div class="entry-author meta-blk">
                     <div class="byline">
                        <span class="bytext">@lang('Posted By')</span>
                        {{ $post->users->name }}
                     </div>
                  </div>

                  <div class="meta-bottom">

                     <div class="meta-blk">
                        <span>@lang('On')</span>
                        {{ $post->created_at->format('d-m-Y') }}
                     </div>

                     @isset($post->updated_at)
                     <div class="meta-blk">
                        <span>@lang('Updated On')</span>
                        {{ $post->updated_at->format('d-m-Y') }}
                     </div>
                     @endisset

                     <div class="entry-tags meta-blk">
                        <span class="tagtext">@lang('Tags')</span>
                        @foreach($post->tags as $tag)
                        <a href="{{route('tag', $tag->id)}}">{{ $tag->tag }}</a>
                        @endforeach
                     </div>

                  </div>

               </div>
            </div>
         </section>


         <section class="row">
            <div class="large-12">
               <div class="s-content__primary">

                  <div class="s-content__entry-content">

                     {{$post->description}}

                  </div>
               </div>
         </section>


         

         <!-- comments
================================================== -->
         <section class="comments-wrap">

            <div id="comments" class="row">
               <div id="commentsList" class="column large-12">

                  @if($post->valid_comments_count > 0)
                  <div id="forShow">
                     <p id="showbutton" class="text-center">
                        <a id="showcomments" href="{{ route('post.comments', $post->id) }}" class="btn h-full-width">@lang('Show comments')</a>
                     </p>
                     <p id="showicon" class="h-text-center" hidden>
                        <span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>
                     </p>
                  </div>
                  @endif

               </div>
            </div>
         </section>

         <section class="s-content__pagenav row">
            @isset($post->previous)
            <div class=" column large-5 prev-nav">

               <a href="#">
                  <span>@lang('Previous')</span>
                  {{ $post->previous->title }}
               </a>
            </div>
            @endisset

            @isset($post->next)
            <div class=" column large-5 next-nav">
               <a href="#">
                  <span>@lang('Next One')</span>
                  {{ $post->next->title }}
               </a>
            </div>
            @endisset
         </section>

   </div>
   </article>

</div>
</div>

@endsection