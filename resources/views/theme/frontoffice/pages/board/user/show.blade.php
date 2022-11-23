@extends('theme.frontoffice.layouts.admin')
@section('title','pagina demo')
@section('head')
@endsection
@section('breadcrumbs')
    <li><a href="">Editar</a>
    </li>
@endsection
@section('content')
    <div id="" class="">
        <div class="">
            <h5>Editar Tablero</h5>
            <div class="section">
                <p><strong>Usuario:</strong>{{$user->name}}</p>
                <div class="divider"></div>
                <div class="section">
                    <div class="row">
                        <div class="col s12 m8 ">
                            <div class="card">
                                <div class="card-content">
                                    <span class="card-title">{{$user->name}}</span>
                                    <p><strong>Roles: </strong>{{$user->list_roles()}}</p>
                                    @if($user->has_role(config('app.anfitrion_role')))
                                        <p><strong>Tableros:</strong> {{$user->list_boards()}} </p>
                                    @endif

                                    <ul>
                                        @foreach($user->roles as $role)
                                            <li>{{$role->name}}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="card-action">
                                    <a href="#" onclick="enviar_formulario()" >Eliminar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4 ">
                            @include('theme.backoffice.pages.user.includes.user_nav')
                        </div>
                    </div>
                </div>
            </div>
            <form method="post" action="{{route('backoffice.user.destroy',$user)}}" name="delete_form" >
                {{csrf_field()}}
                {{method_field('DELETE')}}
            </form>
        </div>

    </div>
@endsection
@section('foot')
    <script>
        function enviar_formulario(){
            document.delete_form.submit();
        }
    </script>
@endsection
