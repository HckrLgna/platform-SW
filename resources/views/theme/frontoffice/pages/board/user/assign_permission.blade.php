@extends('theme.frontoffice.layouts.admin')
@section('title','Asignacion de permisos')
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
                <p class="caption">Selecciona los permisos que desea asignar</p>
                <div class="divider"></div>
                <div class="section">
                    <div class="row">
                        <div class="col s12 m8 ">
                            <div class="card">
                                <div class="card-content">
                                    <span class="card-title">Asignar permisos</span>
                                    <div class="row">
                                        <form class="col s12 m8 offset-m2" method="post" action="{{route('frontoffice.board.user.permission_assignment',$user)}}">
                                            {{csrf_field()}}

                                            {{--aqui se muestra permisos--}}
                                            @foreach($roles as $role)
                                                <p>{{$role->name}} </p>
                                                @foreach($role->permissions as $permission)
                                                    <p>
                                                        <label for="{{$permission->id}}">
                                                            <input type="checkbox" id="{{$permission->id}}" name="permissions[]" value="{{$permission->id}}"
                                                                   @if($user->has_permission($permission->id)) checked @endif
                                                            />
                                                            <span>{{$permission->name}}</span>
                                                        </label>
                                                    </p>
                                                @endforeach
                                            @endforeach
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <button class="btn waves-effect waves-light right" type="submit" >Guardar
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m4 ">
                            @include('theme.backoffice.pages.user.includes.user_nav')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('foot')
@endsection
