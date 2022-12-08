@extends('theme.frontoffice.layouts.admin')
@section('title','Board')
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
            <div class="row">
                <form class="col s12" method="post" action="{{route('frontoffice.board.update',$board)}}">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="name" type="text" class="validate" name="name" value="{{$board->name}}">
                            <label class="active" for="name">Nombre del tablero</label>
                        </div>
                        <div class="input-field col s6">
                            <textarea id="textarea1" class="materialize-textarea" name="description">{{$board->description}}</textarea>
                            <label for="textarea1">Descripcion del tablero</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" name="path_img" value="{{$board->path_img}}">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
                        </button>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                    </div>
                </form>
            </div>
            <div class="row pt-2">
                <h5>Participantes Tablero</h5>
                <div class="divider"></div>
                <div class="section">
                    <div class="row">
                        <div class="col s12">
                            <div class="card-panel">
                                <div class="row">
                                    <table class="responsive-table">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Roles del sistema</th>
                                            <th colspan="2">Acciones</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td><a href="{{route('frontoffice.board.user.show',$user)}}">{{$user->name}}</a></td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->list_roles()}}</td>
                                                <td><a href="#">Editar</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('foot')
@endsection
