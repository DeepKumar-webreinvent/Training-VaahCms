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


<section class="hero">
    <figure class="image">
        <img src="https://images.pexels.com/photos/167636/pexels-photo-167636.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940">
{{--        {!! get_field($data, 'image', 'default') !!}--}}
{{--        {!! dd(get_field($data, 'image', 'default')) !!}--}}
{{--        {!! dd(get_field($data, 'image', 'default')) !!}--}}
    </figure>
</section>

<section class="section">
    <div class="container has-text-centered">
        {!! get_field($data, 'title', 'default','template') !!}

        @foreach(get_the_field($data, 'description', 'default','content' , 0, 2) as $index=>$item)
            @if($index == 0)
                <p>{{$item}}</p>
            @endif
        @endforeach
{{--        {!! dd(get_field($data, 'description', 'default','content' , 0, 1)) !!}--}}

        <div class="columns is-centered" style="padding: 2rem">
            @foreach( get_the_group($data ,'card' ) as $v)
                <div class="column">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-2by1">
                                <img src="https://images.pexels.com/photos/167635/pexels-photo-167635.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">{{$v['heading']}}</p>
                                    <p class="subtitle is-6">{{$v['subheading']}}</p>
                                </div>
                            </div>

                            <div class="content">
                                {{$v['content']}}
                                <a>{{$v['a1']}}</a>.
                                @foreach($v['a2'] as $a)
                                <a href="#">{{$a}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section">
    <div class="container has-text-centered">
        <h2 class="title">
            @foreach(get_the_field($data, 'heading', 'default') as $index=>$item)
                @if($index == 0)
                    {{$item}}
                @endif
            @endforeach
        </h2>

        <div class="tile is-ancestor">
            @foreach(get_the_group($data ,'tour' ) as $index=>$tour)
                @if($index > 4)
                    @break;
                @endif
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <figure class="image">
                            <img src="https://images.pexels.com/photos/374710/pexels-photo-374710.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
                        </figure>
                        <p class="title">{{$tour['title']}}</p>
                        <p class="subtitle">{{$tour['subtitle']}}</p>
                        <a class="button">{{$tour['button']}}</a>
                    </article>
                </div>
            @endforeach
        </div>

        <div class="tile is-ancestor">
            @foreach(get_the_group($data ,'tour' ) as $index=>$tour)
                @if($index >= 5 && $index < 10)
                    <div class="tile is-parent">
                        <article class="tile is-child box">
                            <figure class="image">
                                <img src="https://images.pexels.com/photos/374710/pexels-photo-374710.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
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

<section class="section">
    <div class="container has-text-centered">
        <h2 class="title">
            @foreach(get_the_field($data, 'heading', 'default') as $index=>$item)
                @if($index == 1)
                    {{$item}}
                @endif
            @endforeach
        </h2>
{{--        {!! dd(get_field($data, 'heading', 'default','content' , 0, 1)) !!}--}}

        <form>
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <p class="control has-icons-left">
                            <input class="input" type="text" placeholder="Name">
                            <span class="icon is-small is-left">
                                    <i class="fas fa-user"></i>
                                </span>
                        </p>
                    </div>

                    <div class="field">
                        <p class="control has-icons-left has-icons-right">
                            <input class="input" type="email" placeholder="Email">
                            <span class="icon is-small is-left">
                                    <i class="fas fa-envelope"></i>
                                </span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <textarea class="textarea" placeholder="Message us"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <button class="button is-primary">
                                @foreach(get_the_field($data, 'description', 'default','content' , 0, 2) as $index=>$item)
                                    @if($index == 1)
                                        {{$item}}
                                    @endif
                                @endforeach
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="content has-text-centered">
            <p>
                <a href="">
                    <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="">
                    <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
                <a href="">
                    <i class="fab fa-snapchat fa-2x"></i>
                </a>
            </p>
            <p>
                <a href="https://bulma.io">
                    <img src="https://bulma.io/images/made-with-bulma.png" alt="Made with Bulma" width="128" height="24">
                </a>
            </p>
        </div>
    </div>
</footer>
<script src="../js/bulma.js"></script>
</body>

</html>
