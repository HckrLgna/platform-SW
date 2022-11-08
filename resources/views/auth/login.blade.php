@extends('layouts.app')

@section('content')
<div class="container padding-6">
    <div class="row">
        <div class="col m6 right-align">
            <img src="https://images.unsplash.com/photo-1491975474562-1f4e30bc9468?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=387&q=80" alt="imagen de un tablero">
        </div>
        <div class="col m-6 width-50">
            <div class="card">
                <div class="card-header center-align pt-5"><h5 style="color: rgba(18,20,25,0.6)">Iniciar sesion</h5></div>
                <div class="card-body center-align padding-10">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row ">
                            <div class="input-field col m10 ">
                                <input id="email" type="email" class="validate" name="email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col m10 pl-3">
                                <input id="password" type="password" class="validate" name="password">
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col left-align">
                                <p>
                                    <label>
                                        <input type="checkbox" name="remember" />
                                        <span>{{ __('Remember Me') }}</span>
                                    </label>
                                </p>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
