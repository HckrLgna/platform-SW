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
<!-- END HEADER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START MAIN -->
<div id="main">

    <!-- START WRAPPER -->
    <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        @include('theme.frontoffice.layouts.includes.leftsidebar')
        @include('theme.frontoffice.layouts.includes.breadcrumb')
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">

        <!--start container-->
            <div class="container">
                @yield('content')
            </div>
            <!--end container-->
        </section>
        <!-- END CONTENT -->
        @include('theme.frontoffice.layouts.includes.aside')
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
