@extends('theme.frontoffice.layouts.board')
@section('title','Board')
@section('head')
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="{{ asset('css/rappid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme-picker.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.dark.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.material.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.modern.css') }}">
@endsection

@section('content')
    <form class="form">
        <button type="submit" class="btnClick" hidden>Send</button>
    </form>
    <div id="app">
        <div class="app-header">
            <div class="app-title">
                <h1>JointJS+</h1>
            </div>
            <div class="toolbar-container"></div>
        </div>
        <div class="app-body">
            <div class="stencil-container"></div>
            <div class="paper-container"></div>
            <div class="inspector-container"></div>
            <div class="navigator-container"></div>
        </div>
    </div>
@endsection
@section('foot')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/lodash.js') }}"></script>
    <script src="{{ asset('js/backbone.js') }}"></script>
    <script src="{{ asset('js/graphlib.core.js') }}"></script>
    <script src="{{ asset('js/dagre.core.js') }}"></script>
    <script src="{{ asset('js/rappid.js') }}"></script>

    <script src="{{ asset('js/config/halo.js') }}"></script>
    <script src="{{ asset('js/config/selection.js') }}"></script>
    <script src="{{ asset('js/config/inspector.js') }}"></script>
    <script src="{{ asset('js/config/stencil.js') }}"></script>
    <script src="{{ asset('js/config/toolbar.js') }}"></script>
    <script src="{{ asset('js/config/sample-graphs.js') }}"></script>
    <script src="{{ asset('js/views/main.js') }}"></script>
    <script src="{{ asset('js/views/theme-picker.js') }}"></script>
    <script src="{{ asset('js/models/joint.shapes.app.js') }}"></script>
    <script src="{{ asset('js/views/navigator.js') }}"></script>
    <script>
        joint.setTheme('modern');
        app = new App.MainView({
            el: '#app'
        });
        themePicker = new App.ThemePicker({
            mainView: app
        });
        themePicker.render().$el.appendTo(document.body);
        window.addEventListener('load', function() {
            app.graph.fromJSON(JSON.parse(App.config.sampleGraphs.emergencyProcedure));
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
    <script  src="/js/app.js"></script>
    <script  src="/js/board.js"></script>
@endsection
