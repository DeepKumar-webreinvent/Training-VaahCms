@extends("vaahcms::backend.vaahone.layouts.backend")

@section('vaahcms_extend_backend_css')

@endsection


@section('vaahcms_extend_backend_js')
    <!--<script src="{{vh_theme_assets_url("BlogTheme", "assets/js/script.js")}}"></script>-->
@endsection

@section('content')

    <!--sections-->
    <section class="section">
        <div class="container">
            <h1 class="title">BlogTheme</h1>
            <h2 class="subtitle">
                Your <strong>"BlogTheme"</strong> theme's dashboard is ready!
            </h2>
        </div>
    </section>
    <!--sections-->



@endsection
