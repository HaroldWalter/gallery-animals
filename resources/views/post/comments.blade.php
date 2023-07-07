<h2>
    @lang('Comments')
    @if(Auth::guest())
        <span>@lang('You must be connected to add a comment.')</span>
    @endif
</h3>
<!-- Commentlist -->
<ol class="commentlist">
    <x-post.comments :comments="$comments"/>
</ol>