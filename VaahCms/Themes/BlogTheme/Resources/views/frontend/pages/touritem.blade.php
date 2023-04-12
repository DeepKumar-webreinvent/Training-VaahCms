<section class="section">
    <div class="container has-text-centered">
        <h2 class="title">Tour Dates
        </h2>


        @foreach(get_the_contents('tour')['list'] as $index=>$tour_item)
          @if($index == 0 || $index == 5)<div class="tile is-ancestor">@endif
{{--            @foreach(get_the_contents('tour')['list'] as $index=>$tour_item)--}}
{{--                @if($index > 4)--}}
{{--                    @break;--}}
{{--                @endif--}}

                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <figure class="image">
                            <img src="{{get_the_field($tour_item, 'image', 'default')}}">
                        </figure>
                        <p class="title">{{get_the_field($tour_item, 'title', 'default')}}</p>
                        <p class="subtitle">{{get_the_field($tour_item, 'subtitle', 'default')}}</p>
                        <a class="button">{{get_the_field($tour_item, 'button', 'default')}}</a>
                    </article>

                </div>
{{--            @endforeach--}}
                @if($index == 4 || $index == 9)</div>@endif
        @endforeach


{{--        <div class="tile is-ancestor">--}}
{{--            @foreach(get_the_contents('tour')['list'] as $index=>$tour_item)--}}
{{--                @if($index >= 5 && $index < 10)--}}
{{--                    <div class="tile is-parent">--}}
{{--                        <article class="tile is-child box">--}}
{{--                            <figure class="image">--}}
{{--                                <img src="{{get_the_field($tour_item, 'image', 'default')}}">--}}
{{--                            </figure>--}}
{{--                            <p class="title">{{get_the_field($tour_item, 'title', 'default')}}</p>--}}
{{--                            <p class="subtitle">{{get_the_field($tour_item, 'subtitle', 'default')}}</p>--}}
{{--                            <a class="button">{{get_the_field($tour_item, 'button', 'default')}}</a>--}}
{{--                        </article>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--        </div>--}}

    </div>
</section>
