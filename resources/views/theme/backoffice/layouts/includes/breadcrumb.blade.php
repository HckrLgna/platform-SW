<div id="breadcrumbs-wrapper">
    <!-- Search for small screen -->
    <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
    </div>
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title">@yield('title')</h5>
                <ol class="breadcrumbs">
                    <li><a href="#">Panel de administracion</a>
                    </li>
                    @yield('breadcrumbs')
                </ol>
            </div>
            <div class="col s2 m6 l6">
                <!-- Dropdown Trigger -->
                <a class='dropdown-trigger btn  waves-effect waves-light breadcrumbs-btn right' href='#' data-target='dropdown2'><i class="material-icons hide-on-med-and-up">settings</i>
                    <span class="hide-on-small-onl">Acciones</span>
                    <i class="material-icons right">arrow_drop_down</i>
                </a>

                <!-- Dropdown Structure -->
                <ul id='dropdown2' class='dropdown-content'>
                    @yield('dropdown_settings')
                </ul>
            </div>
        </div>
    </div>
</div>
