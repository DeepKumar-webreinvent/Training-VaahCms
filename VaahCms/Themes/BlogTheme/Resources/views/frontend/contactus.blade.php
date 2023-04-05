@extends("blogtheme::frontend.layouts.default")

@section('vaahcms_extend_frontend_head')

@endsection

@section('vaahcms_extend_frontend_css')

@endsection

@section('vaahcms_extend_frontend_scripts')

@endsection

@section('content')

    <div class="container has-text-centered mt-6">

        <div class="notification is-link is-light">
            This is the contact us page
        </div>

        <section class="hero">
            <div class="hero-body">
{{--                <p class="title">BlogTheme</p>--}}

{{--                <p class="subtitle">Home Page</p>--}}
{{--                {!! get_field($data, 'address', 'default') !!}--}}
                {!! get_field($data, 'content', 'default') !!}


                <input class="input is-primary" type="text" placeholder="Name"> <br><br>

                <input class="input is-primary" type="text" placeholder="Email"> <br><br>

                <div class="field">
                    <div class="control">
                        <textarea class="textarea" placeholder="Message"></textarea>
                    </div>
                </div>

                <button class="button is-link">Submit</button>




                <hr>

                {!! get_group($data ,'header' ) !!}


            </div>
        </section>

    </div>
@endsection
