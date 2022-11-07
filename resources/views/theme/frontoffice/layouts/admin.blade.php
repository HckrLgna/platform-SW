<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('theme.frontoffice.layouts.includes.head')

</head>
<body>
<!-- Start Page Loading -->
@include('theme.frontoffice.layouts.includes.loader')
<!-- End Page Loading -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START HEADER -->
@include('theme.frontoffice.layouts.includes.header')
<ul id="slide-out" class="sidenav">
    @include('theme.frontoffice.layouts.includes.aside')
</ul>
<!-- END HEADER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START MAIN -->
<div id="main">

    <!-- START WRAPPER -->
    <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        @include('theme.frontoffice.layouts.includes.leftsidebar')
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">

        <!--start container-->
            <div class="container pt-2 pb-2">
                @yield('content')
            </div>
            <!--end container-->
        </section>
        <!-- END CONTENT -->

        <!-- START RIGHT SIDEBAR NAV-->

        <!-- END RIGHT SIDEBAR NAV-->
    </div>
    <!-- END WRAPPER -->
</div>
<!-- END MAIN -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START FOOTER -->
@include('theme.frontoffice.layouts.includes.footer')
<!-- END FOOTER -->
<!-- ================================================
Scripts
================================================ -->
<!-- jQuery Library -->
@include('theme.frontoffice.layouts.includes.foot')
</body>
</html>
