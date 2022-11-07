@extends('theme.frontoffice.layouts.admin')
@section('title','pagina demo')
@section('head')
@endsection

@section('content')
        <div class="row">
            <div class="col s3">
                <!-- Modal Trigger -->
                <button data-target="modalCreateBoard" class="btn modal-trigger">Modal</button>
            </div>
            <div class="col s8">
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Search" />
            </div>
            <!-- Modal Structure -->
            <div id="modalCreateBoard" class="modal">
                <div class="modal-content">
                    <h4>Crear Tablero</h4>
                    <div class="row">
                        <form class="col s12" method="post" action="{{route('frontoffice.board.store')}}">
                            @csrf
                            <div class="row">
                                <div class="input-field col s6">
                                    <input value="" id="name" type="text" class="validate" name="name">
                                    <label class="active" for="name">Nombre del tablero</label>
                                </div>
                                <div class="input-field col s6">
                                    <textarea id="textarea1" class="materialize-textarea" name="description"></textarea>
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
                                        <input class="file-path validate" type="text" name="path_img">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Crear
                                    <i class="material-icons right">create_new_folder</i>
                                </button>
                                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            @foreach($boards as $board)
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://materializecss.com/images/office.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{$board->name}}<i class="material-icons right">more_vert</i></span>
                        <p>
                            <a class="waves-effect waves-light btn-small" href="{{route('frontoffice.board.show',$board)}}">Continuar</a>
                            <a href="{{route('frontoffice.board.edit',$board)}}">Editar</a>
                            <a class="" href=""
                               onclick="event.preventDefault();
                                                     document.getElementById('destroy-form').submit();">
                                {{ __('Eliminar') }}
                            </a>
                            <form id="destroy-form" action="{{route('frontoffice.board.destroy',$board) }}" method="post" class="d-none">
                                @method('delete')
                                @csrf
                            </form>
                        </p>

                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Participantes<i class="material-icons right">close</i></span>
                        <ul class="collection with-header">

                            @foreach($board->users as $user)
                                @if(count($user->roles))
                                    @if($user->roles->first()->name == "Anfitrion")
                                        <a href="#!" class="collection-item"><span class="new badge">{{$user->roles->first()->name}}</span>{{$user->name}}</a>
                                    @endif
                                        <a href="#!" class="collection-item"><span class="badge">{{$user->roles->first()->name}}</span>{{$user->name}}</a>
                                @endif
                            @endforeach
                        </ul>
                        <!-- Modal Trigger -->
                        <a class="btn-floating btn-large waves-effect waves-light red btn modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
                    </div>
                </div>
                <!-- Modal Structure -->
                <div id="modal1" class="modal">
                    <form action="{{route('frontoffice.send-invitation')}}" method="post">
                        @csrf
                        <div class="modal-content">
                            <h4>Envia invitaciones</h4>
                                <div class="input-field col s12">
                                    <input id="email" type="email" class="validate" name="email">
                                    <label for="email">Email</label>
                                </div>

                                <h6>Permisos</h6>
                            <div class="input-field col s12">
                                <select name="role">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                        <label>Materialize Select</label>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Enviar
                                <i class="material-icons right">send</i>
                            </button>
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

@endsection
@section('foot')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            M.AutoInit();
        });
    </script>

@endsection
