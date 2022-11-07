@extends('theme.frontoffice.layouts.board')
@section('title','Board')
@section('head')
    <link rel="stylesheet" href="{{ asset('/assets/frontoffice/css/rappid.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontoffice/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontoffice/css/theme-picker.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontoffice/css/style.dark.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontoffice/css/style.material.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/frontoffice/css/style.modern.css') }}">
@endsection

@section('content')
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
    <script  src="{{asset('/assets/backoffice/js/materialize.min.js')}}"></script>
    <script src="{{ asset('/assets/frontoffice/js/jquery.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/lodash.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/backbone.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/graphlib.core.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/dagre.core.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/rappid.js') }}"></script>

    <script src="{{ asset('/assets/frontoffice/js/config/halo.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/config/selection.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/config/inspector.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/config/stencil.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/config/toolbar.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/config/sample-graphs.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/views/main.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/views/theme-picker.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/models/joint.shapes.app.js') }}"></script>
    <script src="{{ asset('/assets/frontoffice/js/views/navigator.js') }}"></script>
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
    <!-- Local file warning: -->
    <div id="message-fs" style="display: none;">
        <p>The application was open locally using the file protocol. It is recommended to access it trough a <b>Web
                server</b>.</p>
        <p>Please see <a href="README.md">instructions</a>.</p>
    </div>
    <script>
        (function() {
            var fs = (document.location.protocol === 'file:');
            var ff = (navigator.userAgent.toLowerCase().indexOf('firefox') !== -1);
            if (fs && !ff) {
                (new joint.ui.Dialog({
                    width: 300,
                    type: 'alert',
                    title: 'Local File',
                    content: $('#message-fs').show()
                })).open();
            }
        })();
    </script>
@endsection
