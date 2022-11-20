@extends('theme.backoffice.layouts.admin')
@section('title','Asignar Tableros')
@section('head')
@endsection
@section('breadcrumbs')
    <li><a href="{{route('backoffice.user.index')}}">Usuarios del Sistema</a></li>
    <li><a href="{{route('backoffice.user.show',$user)}}">{{$user->name}}</a></li>
    <li><a href="" class="active">Asignar tableros</a> </li>
@endsection
@section('content')
    <div class="section">
        <p class="caption">Selecciona los tableros que desea asignar</p>
        <div class="divider"></div>
        <div class="section">
            <div class="row">
                <div class="col s12 m8 ">
                    <div class="card">
                        <div class="card-content">
                            <span class="card-title">Asignar especialidades</span>
                            <div class="row">
                                <form class="col s12 m8 offset-m2" method="post" action="{{route('backoffice.user.board_assignment',$user)}}">
                                    {{csrf_field()}}
                                    @foreach($roles as $role)
                                        <ul>{{$role->name}}</ul>
                                            @foreach($boards as $board)
                                                <li>
                                                    <label for="{{$board->id}}">
                                                        <input type="checkbox" id="{{$board->id}}" name="boards[]" value="{{$board->id}}"
                                                               @if($user->has_board($board->id)) checked @endif
                                                        />
                                                        <span>{{$board->name}}</span>
                                                    </label>
                                                </li>
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

@endsection
@section('foot')
@endsection
