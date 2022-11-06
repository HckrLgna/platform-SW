<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">

        <li class="no-padding">
            <ul class="collapsible" data-collapsible="accordion">
                <li class="bold">
                    <a href="{{route('backoffice.admin.show')}}" class="waves-effect waves-cyan">
                        <i class="material-icons">pie_chart_outlined</i>
                        <span class="nav-text">Panel de administracion</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{route('backoffice.user.index')}}" class="waves-effect waves-cyan">
                        <i class="material-icons">peoples</i>
                        <span class="nav-text">Usuarios del Sistema</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{route('backoffice.role.index')}}" class="waves-effect waves-cyan">
                        <i class="material-icons">perm_identity</i>
                        <span class="nav-text">Roles del sistema</span>
                    </a>
                </li>
                <li class="bold">
                    <a href="{{route('backoffice.permission.index')}}" class="waves-effect waves-cyan">
                        <i class="material-icons">vpn_key</i>
                        <span class="nav-text">Permisos del sistema</span>
                    </a>
                </li>

            </ul>
        </li>
    </ul>
    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only">
        <i class="material-icons">menu</i>
    </a>
</aside>
