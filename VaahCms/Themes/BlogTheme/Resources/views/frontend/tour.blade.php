<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Band Template</title>
    <link rel="shortcut icon" href="../images/fav_icon.png" type="image/x-icon">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"></script>
</head>

<body>
<nav class="navbar is-dark">
    <div class="navbar-brand">
        <a class="navbar-item" href="https://bulma.io">
            <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
        </a>
        <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
        <div class="navbar-start">
            {!! (vh_location('top', true)) !!}
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="field">
                    <div class="control">
                        <input class="input" type="text" placeholder="Search . . .">
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>



<section class="section">
    <div class="container has-text-centered">
        <h2 class="title">
{{--            @foreach(get_the_field($data, 'heading', 'default') as $index=>$item)--}}
{{--                @if($index == 0)--}}
{{--                    {{$item}}--}}
{{--                @endif--}}
{{--            @endforeach--}}
        </h2>

        <div class="tile is-ancestor">
            @foreach(get_the_group($data ,'default' ,'template') as $index=>$tour)
                @if($index > 4)
                    @break;
                @endif
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <figure class="image">
                            <img src="{{$tour['image']}}">
                        </figure>
                        <p class="title">{{$tour['title']}}</p>
                        <p class="subtitle">{{$tour['subtitle']}}</p>
                        <a class="button">{{$tour['button']}}</a>
                    </article>
                </div>
            @endforeach
        </div>

        <div class="tile is-ancestor">
            @foreach(get_the_group($data ,'default' ,'template') as $index=>$tour)
                @if($index >= 5 && $index < 10)
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <figure class="image">
                                <img src="{{$tour['image']}}">
                            </figure>
                            <p class="title">{{$tour['title']}}</p>
                            <p class="subtitle">{{$tour['subtitle']}}</p>
                            <a class="button">{{$tour['button']}}</a>
                        </article>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>


<script src="../js/bulma.js"></script>
</body>

</html>


