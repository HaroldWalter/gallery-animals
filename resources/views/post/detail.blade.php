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
            <div class="column large-8">
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
                        <a href="#0">{{ $post->users->name }}</a>
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
                        <a href="#">{{ $tag->tag }}</a>
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