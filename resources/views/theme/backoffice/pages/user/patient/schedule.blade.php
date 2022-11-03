@extends('theme.backoffice.layouts.admin')
@section('title'.'Agendar cita para: '. $user->name)
@section('head')
    <link rel="stylesheet" href="{{ asset('assets/frontoffice/plugins/pickadate/themes/default.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/frontoffice/plugins/pickadate/themes/default.date.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontoffice/plugins/pickadate/themes/default.time.css')}}">
@endsection
@section('breadcrumbs')
    <li><a href="{{route('backoffice.user.index')}}">Usuarios del sistema</a></li>
    <li><a href="{{route('backoffice.user.show',$user)}}">{{$user->name}}</a></li>
    <li><a href="">Agendar Cita</a></li>
@endsection

@section('dropdown_settings')
    <li><a href="{{route('backoffice.user.edit',$user)}}" class="grey-text text-darken-2">Editar usuarios</a></li>
@endsection

@section('content')
    <div class="section">
        <strong>Usuario:</strong> <p>{{$user->name}}</p>
        <div class="divider"></div>
        <div class="section">
            <div class="row">
                <div class="col s12 m8">
                    <div class="card">
                        <div class="card-content">
                        <span class="card-title">
                            @yield('title' )
                        </span>
                            <form action="" method="POST">
                                {{csrf_field()}}
                                @if(Auth::user()->has_role(config('app.doctor_role')))
                                    <input type="hidden" name="speciality" value="">
                                    <input type="hidden" name="doctor" value="{{ Auth::id() }}">
                                @else
                                    <div class="row">
                                    <div class="input-field cols12">
                                        <i class="material-icons prefix">people</i>
                                        <select name="speciality">
                                            <option value="1"> Pediatra</option>
                                        </select>
                                        <label for="doctor">Selecciona la especialidad </label>
                                    </div>
                                </div>
                                    <div class="row">
                                    <div class="input-field cols12">
                                        <i class="material-icons prefix">people</i>
                                        <select name="doctor" id="doctor">
                                            <option value="1"> Ramirez</option>
                                        </select>
                                        <label for="doctor">Selecciona al doctor</label>
                                    </div>
                                </div>
                                @endif
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">date_range</i>
                                        <input id="datepicker" type="text" name="date" class="datepicker" placeholder="Selecciona una fecha">

                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">access_time</i>
                                        <input id="timepicker" type="text" name="time" class="timepicker" placeholder="Selecciona una hora">

                                    </div>
                                </div>
                                <div class="row">
                                    <button class="btn waves-effect weves-light doctype" type="submit">Agendar <i class="material-icons right">send</i> </button>
                                </div>
                            </form>
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
    <script src="{{ asset('assets/frontoffice/plugins/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/frontoffice/plugins/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('assets/frontoffice/plugins/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('assets/frontoffice/plugins/pickadate/legacy.js') }}"></script>
    <script>
        var input_date = $('.datepicker').pickadate({
            min: true
        });
        var date_picker = input_date.pickadate('picker');


        var input_time = $('.timepicker').pickatime({
            min: 4
        });
        var time_picker = input_time.pickatime('picker');
    </script>


@endsection
