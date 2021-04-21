@extends('layouts.dashboardLayout')


@section('content')


<div class="dashboardContentContainer">

    <div class="dashboardHeader">

        <div class="dashboardHeaderDetails">

            <p>Somename</p>

            fo
            <form action="{{url('/logout')}}" method="POST">
                @csrf
                <button type="submit">Log Out</button>
                </form>

        </div>



    </div>


    <div class="allproducts">

        @if(session('deleted'))

        <p class="successFullMessage">{{session('deleted')}}</p>

        @endif




        <table class="table">

            <tr>

                <th>Name</th>
                <th>Title</th>
                <th>Sale Price</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>View</th>

            </tr>

            @foreach($products as $product)



            <tr>

                <td>{{$product->name}}</td>
                <td>{{$product->title}}</td>
                <td>${{$product->salePrice}}</td>
                <td>${{$product->price}}</td>
                <td>{{$product->stock}}</td>
                <td>{{$product->category}}</td>
                <td><a class="btn btn-info" href="{{url('/admin/product/edit/'.$product->id)}}">Edit</a></td>


                <td><a class="btn btn-danger" href="{{url('/admin/product/delete/'.$product->id)}}">Delete</a></td>
                <td><a class="btn btn-info" href="{{url('/product/'.$product->id)}}">View</a></td>

            </tr>

            @endforeach




        </table>



    </div>




</div>


@stop


@section('scripts')



@stop