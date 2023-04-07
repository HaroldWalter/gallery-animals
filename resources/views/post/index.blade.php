@extends('layouts.layouthf')

@section('title')
    {{ 'Gallerie' }}
@endsection

@section('content')
    <div id="post-data">
        @include('child')
    </div>

    <div class="ajax-load" style="display:none">
        <p>loading...</p>
    </div>

    <script type="text/javascript">
        var page = 1;
        $(window).scroll(function() {
            if ($(window).scrollTop() + $(window).height() >= $(document).height()) {
                page++;
                loadMoreData(page);
            }
        });

        function loadMoreData(page) {
            $.ajax({
                    url: '?page=' + page,
                    type: "get",
                    beforeSend: function() {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data) {
                    if (data.html == " ") {
                        $('.ajax-load').html("No records!");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#post-data").append(data.html);
                })
        }
    </script>
@endsection
