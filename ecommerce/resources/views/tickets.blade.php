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


    <div class="tickets">


        @if(session('deleted'))


        <p class="successFullMessage">{{session('deleted')}}</p>

        @endif


        <table class="table">

            <tr>

                <th>Id</th>
                <th>Date</th>
                <th>Email</th>
                <th>Delete</th>


            </tr>

            @foreach($tickets as $ticket)



            <tr>
                <td>{{$ticket->id}}</td>
                <td>{{$ticket->created_at->format('j F Y')}}</td>
                <td>{{$ticket->email}}</td>
                <td><a class="btn btn-danger btn-sm" href="{{url('/admin/ticket/delete/'.$ticket->id)}}">Delete</a></td>

            </tr>

            @endforeach




        </table>



    </div>




</div>


@stop


@section('scripts')



@stop