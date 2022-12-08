@extends('theme.frontoffice.layouts.admin')
@section('title','Dashboard')
@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href= {{asset('css/app.css')}}>
    <link rel="stylesheet" href="{{asset('css/chat.css')}} ">
@endsection
@section('aside')
    <div id="settings" class="col s12">
        <div class="row width-100 " style="height: 540px; margin-top: -20px; padding-left: -1px; padding-right: 1px">
            <section class="msger">
                <header class="msger-header">
                    <div class="msger-header-title">
                        <i class="fas fa-comment-alt"></i>
                        <span class="chatWith"></span>
                        <span class="typing" style="display: none;"> está escribiendo</span>
                    </div>
                    <div class="msger-header-options">
					<span class="chatStatus offline">
						<i class="fas fa-globe"></i>
					</span>
                    </div>
                </header>

                <div class="msger-chat"></div>

                <form class="msger-inputarea">
                    <input type="text" class="msger-input" oninput="sendTypingEvent()" placeholder="Enter your message...">
                    <button type="submit" class="msger-send-btn">Send</button>
                </form>
            </section>
        </div>
    </div>
    <div id="chatapp" class="col s12">
        <div class="collection border-none">
            <h6 class="mt-5 mb-3 ml-3">Salas de chat</h6>
            @foreach($users_chat as $user  )
                @if($user->id != auth()->user()->id && auth()->user()->chats)
                    <a href="{{route('dashboard.chat.with', $user)}}" id="enviar()" class="collection-item avatar border-none">
                        <img src="{{asset($user->profile_path)}}" alt="avatar" class="circle cyan">
                        <span class="status ">
                                    <i></i>
                                </span>
                        <span class="line-height-0">{{$user->name}} </span>
                        <span class="medium-small right blue-grey-text text-lighten-3">5.00 AM</span>
                            @if(count($chat->messages)&& $chat->users->find($user))
                                <p class="medium-small blue-grey-text text-lighten-3">{{$chat->messages[count($chat->messages)-1]->content}} </p>
                            @endif
                        <input type="text" id="profile_path" value="{{asset($user->profile_path)}}" hidden>
                    </a>
                @else
                    <input type="text" id="profile_path2" value="{{asset($user->profile_path)}}" hidden>
                @endif
            @endforeach
        </div>
    </div>
    <div id="activity" class="col s12">
        <h6 class="mt-5 mb-3 ml-3">RECENT ACTIVITY</h6>
        <div class="activity">
            <div class="col s3 mt-2 center-align recent-activity-list-icon">
                <i class="material-icons white-text icon-bg-color deep-purple lighten-2">add_shopping_cart</i>
            </div>
            <div class="col s9 recent-activity-list-text">
                <a href="#" class="deep-purple-text medium-small">just now</a>
                <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jim Doe Purchased new equipments for zonal office.</p>
            </div>
            <div class="recent-activity-list chat-out-list row mb-0">
                <div class="col s3 mt-2 center-align recent-activity-list-icon">
                    <i class="material-icons white-text icon-bg-color cyan lighten-2">airplanemode_active</i>
                </div>
                <div class="col s9 recent-activity-list-text">
                    <a href="#" class="cyan-text medium-small">Yesterday</a>
                    <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Your Next flight for USA will be on 15th August 2015.</p>
                </div>
            </div>
            <div class="recent-activity-list chat-out-list row mb-0">
                <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                    <i class="material-icons white-text icon-bg-color green lighten-2">settings_voice</i>
                </div>
                <div class="col s9 recent-activity-list-text">
                    <a href="#" class="green-text medium-small">5 Days Ago</a>
                    <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                </div>
            </div>
            <div class="recent-activity-list chat-out-list row mb-0">
                <div class="col s3 mt-2 center-align recent-activity-list-icon">
                    <i class="material-icons white-text icon-bg-color amber lighten-2">store</i>
                </div>
                <div class="col s9 recent-activity-list-text">
                    <a href="#" class="amber-text medium-small">1 Week Ago</a>
                    <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                </div>
            </div>
            <div class="recent-activity-list row">
                <div class="col s3 mt-2 center-align recent-activity-list-icon">
                    <i class="material-icons white-text icon-bg-color deep-orange lighten-2">settings_voice</i>
                </div>
                <div class="col s9 recent-activity-list-text">
                    <a href="#" class="deep-orange-text medium-small">2 Week Ago</a>
                    <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                </div>
            </div>
            <div class="recent-activity-list chat-out-list row mb-0">
                <div class="col s3 mt-2 center-align recent-activity-list-icon medium-small">
                    <i class="material-icons white-text icon-bg-color brown lighten-2">settings_voice</i>
                </div>
                <div class="col s9 recent-activity-list-text">
                    <a href="#" class="brown-text medium-small">1 Month Ago</a>
                    <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Natalya Parker Send you a voice mail for next conference.</p>
                </div>
            </div>
            <div class="recent-activity-list chat-out-list row mb-0">
                <div class="col s3 mt-2 center-align recent-activity-list-icon">
                    <i class="material-icons white-text icon-bg-color deep-purple lighten-2">store</i>
                </div>
                <div class="col s9 recent-activity-list-text">
                    <a href="#" class="deep-purple-text medium-small">3 Month Ago</a>
                    <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">Jessy Jay open a new store at S.G Road.</p>
                </div>
            </div>
            <div class="recent-activity-list row">
                <div class="col s3 mt-2 center-align recent-activity-list-icon">
                    <i class="material-icons white-text icon-bg-color grey lighten-2">settings_voice</i>
                </div>
                <div class="col s9 recent-activity-list-text">
                    <a href="#" class="grey-text medium-small">1 Year Ago</a>
                    <p class="mt-0 mb-2 fixed-line-height font-weight-300 medium-small">voice mail for conference.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col s3">
            <!-- Modal Trigger -->
            <a class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#modalCreateBoard"><i class="material-icons">add</i></a>
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
            <div class="col s12 m6 padding-1">
                <div class="card ">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://materializecss.com/images/office.jpg" alt="imagen">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">{{$board->name}}<i class="material-icons right">more_vert</i></span>
                        <p>
                            <a class="waves-effect waves-light btn-small" href="{{route('frontoffice.board.show',$board)}}">Ver</a>
                            @if(auth()->user()->get_role_board(auth()->user()->id,$board->id)->name == "Anfitrion")
                                <a href="{{route('frontoffice.board.edit',$board)}}">Editar</a>
                                <a class="" href=""
                                   onclick="event.preventDefault();
                                   document.getElementById('destroy-form').submit();">
                                    {{ __('Eliminar') }}
                                </a>
                        @endif
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
                                @if($user->get_role_board($user->id,$board->id)->name == "Anfitrion")
                                    <a href="#!" class="collection-item"><span class="new badge">{{$user->get_role_board($user->id,$board->id)->name}}</span>{{$user->name}}</a>
                                @else
                                    <a href="#!" class="collection-item"><span class="badge">{{$user->get_role_board($user->id,$board->id)->name}}</span>{{$user->name}}</a>
                                @endif
                            @endforeach
                        </ul>
                        <!-- Modal Trigger -->
                        @if($user->get_role_board(auth()->user()->id,$board->id)->name == "Anfitrion")
                            <a class="btn-floating btn-large waves-effect waves-light red btn modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
                        @endif
                    </div>
                </div>
                <!-- Modal Structure -->
                <div id="modal1" class="modal">
                    <form action="{{route('frontoffice.send-invitation',$board)}}" method="post">
                        @csrf
                        <div class="modal-content">
                            <h6>Envia invitaciones</h6>
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email">
                                <label for="email">Email</label>
                            </div>

                            <h6>Permisos</h6>
                            <div class="input-field col s12">
                                <select name="role_id">
                                    <option value="3" name="role_id">Colaborador</option>
                                    <option value="4" name="role_id">Invitado</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer pb-5">
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
    <script  src= " /js/app.js"></script>
    <script  src= "/js/chat.js"></script>
@endsection
