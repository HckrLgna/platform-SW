<header id="header" class="page-topbar">
    <!-- start header nav-->
    <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-blue-indigo">
            <div class="nav-wrapper">
                <ul class="left">
                    <li>
                        <h1 class="logo-wrapper">
                            <a href="index.html" class="brand-logo darken-1">
                                <img src="/images/logo/materialize-logo.png" alt="materialize logo">
                                <span class="logo-text hide-on-med-and-down">Clinica G&A</span>
                            </a>
                        </h1>
                    </li>
                </ul>
                <div class="header-search-wrapper hide-on-med-and-down">
                    <i class="material-icons">search</i>
                    <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search" />
                </div>
                <ul class="right hide-on-med-and-down">

                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                            <i class="material-icons">settings_overscan</i>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="/images/avatar/avatar-7.png" alt="avatar">
                    <i></i>
                  </span>
                        </a>
                    </li>

                </ul>

                <!-- profile-dropdown -->
                <ul id="profile-dropdown" class="dropdown-content">
                    <li>
                        <a href="#" class="grey-text text-darken-1">
                            <i class="material-icons">face</i> Profile</a>
                    </li>
                    <li>
                        <a href="#" class="grey-text text-darken-1">
                            <i class="material-icons">settings</i> Settings</a>
                    </li>
                    <li>
                        <a href="#" class="grey-text text-darken-1">
                            <i class="material-icons">live_help</i> Help</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#" class="grey-text text-darken-1">
                            <i class="material-icons">lock_outline</i> Lock</a>
                    </li>
                    <li>
                        <a c    lass="grey-text text-darken-1" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">keyboard_tab</i> {{ __('Logout') }}
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- end header nav-->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</header>
