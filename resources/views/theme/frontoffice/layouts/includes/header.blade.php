<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-light-blue-cyan">
            <div class="nav-wrapper">
                <ul class="left" style="padding: 10px; margin: 10px;">
                    <li>
                        <h1 class="logo-wrapper">
                            <a href="{{route('home')}}" class="brand-logo darken-1">
                                <img src="{{asset('/images/logo/materialize-logo.png')}}" alt="materialize logo">
                                <span class="logo-text hide-on-med-and-down">Platform</span>
                            </a>
                        </h1>
                    </li>
                </ul>

                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="#" class="dropdown-trigger waves-effect waves-block waves-light profile-button" data-target="dropdown1">
                          <span class="avatar-status avatar-online">
                            <img src="{{asset('/images/avatar/avatar-7.png')}}" alt="avatar">
                            <i></i>
                          </span>
                        </a>
                    </li>

                </ul>
                <!-- profile-dropdown -->
                <ul id="dropdown1" class="dropdown-content">
                    <li>
                        <a href="#" data-target="slide-out" class="sidenav-trigger grey-text text-darken-1">
                            <i class="material-icons">face</i> Profile
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="grey-text text-darken-1" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="material-icons">keyboard_tab</i> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        <ul id="slide-out" class="sidenav">
            <li><div class="user-view">
                    <div class="background">
                        <img src="images/office.jpg">
                    </div>
                    <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
                    <a href="#name"><span class="white-text name">John Doe</span></a>
                    <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
                </div></li>
            <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
            <li><a href="#!">Second Link</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">Subheader</a></li>
            <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
        </ul>
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i> asd</a>
    </div>
    <!-- end header nav-->
</header>
