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
    @yield('content')

    <!-- START RIGHT SIDEBAR NAV-->

        <!-- END RIGHT SIDEBAR NAV-->
<!-- END MAIN -->
<!-- //////////////////////////////////////////////////////////////////////////// -->

<!-- ================================================
Scripts
================================================ -->
<!-- jQuery Library -->
@include('theme.frontoffice.layouts.includes.foot')
</body>
</html>
