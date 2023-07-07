@props(['comments'])

@foreach($comments as $comment)
<li class="comment">
   <div class="comment__content">
      <div class="comment__info">
         <div class="comment__author">{{ $comment->users->name }}</div>
         <div class="comment__meta">
            <div class="comment__time">{{ formatDate($comment->created_at) }}</div>
            @if(Auth::check())
            <div class="comment__reply">

               @if(Auth::user()->name == $comment->users->name)
               <a href="#" class="comment-reply-link deletecomment" style="color:red">
                  @lang('Delete')
               </a>
               @endif
            </div>
            @endif
         </div>
      </div>
      <div class="comment__text">
         <p>{{ $comment->body }}</p>
      </div>
      <ul class="children">
         <x-front.comments :comments="$comment->children" />
      </ul>
   </div>
</li>@endforeach