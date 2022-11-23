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
                <p class="caption">Selecciona los roles que desea asignar</p>
                <div class="divider"></div>
                <div class="section">
                    <div class="row">
                        <div class="col s12 m8 ">
                            <div class="card">
                                <div class="card-content">
                                    <span class="card-title">Asignar roles</span>
                                    <div class="row">
                                        <form class="col s12 m8 offset-m2" method="post" action="{{route('frontoffice.board.user.role_assignment',$user)}}">
                                            {{csrf_field()}}

                                            @foreach($roles as $role)
                                                @if(!auth()->user()->is_admin() && $role->name !='Administrador')
                                                    <p>
                                                        <label for="{{$role->id}}">
                                                            <input type="checkbox" id="{{$role->id}}" name="roles[]" value="{{$role->id}}" @if( $user->has_role($role->id) ) checked @endif/>
                                                            <span>{{$role->name}}</span>
                                                        </label>
                                                    </p>
                                                @endif
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
