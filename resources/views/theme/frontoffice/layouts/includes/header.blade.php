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
    </div>
    <!-- end header nav-->
</header>
