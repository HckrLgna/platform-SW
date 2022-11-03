@extends('theme.backoffice.layouts.admin')
@section('title','Facturas de :'. $user->name)
@section('head')
@endsection
@section('breadcrumbs')
    <li><a href="{{route('backoffice.user.index')}}">Usuarios del sistema</a></li>
    <li><a href="{{route('backoffice.user.show',$user)}}">{{$user->name}}</a></li>
    <li><a class="active" href="{{route('backoffice.patient.invoices',$user)}}">{{'Facturas de : '.$user->name}}</a></li>
@endsection
@section('dropdown_settings')
    <li><a href="{{route('backoffice.patient.schedule',$user)}} " class="grey-text text-darken-2">Agendar nueva cita</a></li>
    <li><a href="# " class="grey-text text-darken-2">Añadir factura</a></li>
@endsection

@section('content')
    <div class="section">
        <p class="caption"><strong>{{'Facturas de : '.$user->name}}</strong></p>
        <div class="divider"></div>
        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m8">
                    <div class="card">
                        <div class="card-content">
                            <table class="responsive-table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Dia</th>

                                </tr>
                                </thead>

                            </table>
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
