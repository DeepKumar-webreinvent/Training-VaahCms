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
            This page should contain welcome message which does not require any database to run.
            You can write theme setup information.
        </div>

        <section class="hero">
            <div class="hero-body">
                <p class="title">BlogTheme</p>

                {!! vh_block('first-block') !!}

                {!! vh_location('top', true) !!}

{{--                <p class="subtitle">Welcome Page.</p>--}}
                {!! get_field($data, 'name', 'default') !!}

                {!! get_field($data, 'state', 'default') !!}

                {!! get_field($data, 'description', 'default') !!}

                {!! get_field($data, 'dob', 'default') !!}

            </div>
        </section>

</div>
@endsection
