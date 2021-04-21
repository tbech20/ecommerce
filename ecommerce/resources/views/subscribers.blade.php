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


    <div class="subscribers">


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

            @foreach($subscribers as $subscriber)



            <tr>
                <td>{{$subscriber->id}}</td>
                <td>{{$subscriber->created_at->format('j F Y')}}</td>
                <td>{{$subscriber->email}}</td>
                <td><a class="btn btn-danger btn-sm" href="{{url('/admin/subscriber/delete/'.$subscriber->id)}}">Delete</a></td>

            </tr>

            @endforeach




        </table>



    </div>




</div>


@stop


@section('scripts')



@stop