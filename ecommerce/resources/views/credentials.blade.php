@extends('layouts.dashboardLayout')


@section('content')


<div class="dashboardContentContainer">

    <div class="dashboardHeader">

        <div class="dashboardHeaderDetails">

            <p>Somename</p>
            <form action="{{url('/logout')}}" method="POST">
                @csrf
                <button type="submit">Log Out</button>
            </form>

        </div>



    </div>


    <div class="credentials">


        <form action="{{url('/changecredentials')}}" method="POST" class="credentialsForm">
            @csrf
            <div class="form-group">

                <label for="username">Username</label>
                <input type="text" required class="form-control" value="{{$user->name}}" name='username' placeholder="Username">


            </div>


            <div class="form-group">

                <label for="password">Password</label>
                <input type="text" class="form-control" name='password' placeholder="Password">


            </div>

            <button class="credentialsSubmitBtn">Change Credentials</button>

            @if(session('successfull'))

            <p class="successfullyUpdatedCredentials">{{session('successfull')}}</p>

            @endif

        </form>



    </div>


</div>


@stop