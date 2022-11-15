<script src="https://code.jquery.com/jquery-3.6.1.slim.min.js" integrity="sha256-w8CvhFs7iHNVUtnSP0YKEg00p9Ih13rlL9zGqvLdePA=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script  src="{{asset('/assets/backoffice/js/plugins.js')}} "></script>
<script  src="{{asset('/assets/backoffice/js/custom-script.js')}} "></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        M.AutoInit();
    });
</script>
@yield('foot')
