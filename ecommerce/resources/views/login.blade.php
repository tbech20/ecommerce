@extends('layouts.appLayout')

@section('styles')

<link href="{{asset('/css/login.css')}}" rel="stylesheet">

@stop


@section('content')


<div class="loginContainer">

    <div class="login">


        <h2>Login</h2>
        <form action="/admin/login" method="POST">
            @csrf
            <div class="loginInputs">



                <input autofocus type="text" name='username' placeholder="Username">
                <input type="password" name='password' placeholder="Password">

                @if(session('loginError'))

                <p class="error">{{session('loginError')}}</p>


                @endif

            </div>

            <button class="loginSubmitBtn" type="submit">Login</button>


    </div>
    </form>
</div>

@stop