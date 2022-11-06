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
    @include('theme.frontoffice.layouts.includes.aside')

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
