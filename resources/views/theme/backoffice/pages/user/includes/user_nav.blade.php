<div class="collection">
    {{--<a href="#!" class="collection-item active">Alvin</a> --}}
    <a href="{{route('frontoffice.board.user.show',$user)}}" class="collection-item active">{{$user->name}}</a>
    @if(Auth::user()->has_any_role([config('app.admin_role'), config('app.anfitrion_role')]) )
            <a href="{{route('frontoffice.board.user.assign_role',$user)}}" class="collection-item ">Cambiar Roles</a>
            <a href="{{route('frontoffice.board.user.assign_permission',$user)}}" class="collection-item ">Cambiar permisos</a>
    @endif

    @if(Auth::user()->has_role(config('app.admin_role')))
        <a href="{{route('backoffice.user.assign_role',$user)}}" class="collection-item ">Asignar Roles</a>
        <a href="{{route('backoffice.user.assign_permission',$user)}}" class="collection-item ">Asignar permisos</a>
        <a href="{{route('backoffice.user.assign_board',$user)}}" class="collection-item ">Asignar tablero</a>
        @if($user->has_role(config('app.doctor_role')))
            <a href="{{route('backoffice.user.assign_speciality',$user)}}" class="collection-item">Asignar especialidad</a>
        @endif

    @endif
</div>
