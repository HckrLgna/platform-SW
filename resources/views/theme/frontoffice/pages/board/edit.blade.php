@extends('theme.frontoffice.layouts.admin')
@section('title','pagina demo')
@section('head')
@endsection
@section('breadcrumb')
    <li><a href="">edit</a>
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
                    <div class="row">
                        <h5>Participantes Tablero</h5>
                        <table>
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Rol</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <select name="role">
                                            <option value="" disabled selected>Seleciona un rol</option>
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        <label>Materialize Select</label>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Actualizar
                        </button>
                        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
@section('foot')
@endsection
