@extends('layouts.appLayout')


@section('styles')

<link href="{{asset('/css/productStyles.css')}}" rel="stylesheet">

@stop


@section('content')


<div class="productContainer">

    <div class="productMiddleContainer">


        <div class="productLeftContainer">

            <div class="productLeftTop">

                <img class="productMainIMage" src="{{url('storage/images/'.$product->mainImage)}}" alt="">

            </div>


            <div class="productLeftBottom">

                <img class="productSmallImage productSmallImageActive" src="{{url('storage/images/'.$product->subImage1)}}" alt="">
                <img class="productSmallImage" src="{{url('storage/images/'.$product->subImage2)}}" alt="">
                <img class="productSmallImage" src="{{url('storage/images/'.$product->subImage3)}}" alt="">
                <img class="productSmallImage" src="{{url('storage/images/'.$product->subImage4)}}" alt="">
                <img class="productSmallImage" src="{{url('storage/images/'.$product->subImage5)}}" alt="">

            </div>


        </div>


        <div class="productRightContainer">

            <p class="productFirstLine">{{$product->title}}</p>
            <h2 class="productName">{{$product->name}}</h2>

            <div class="productRating">

                <i class="fas fa-star"></i>
                <p>{{$product->rating}}</p>

            </div>


            <div class="productDiscountValues">

                <p class="productValue"> ${{$product->price}} </p>

                <p class="productDiscountValue"> ${{$product->salePrice}} </p>

            </div>

            <p class="productDescription">{{$product->description}}</p>
            <p class="productCategory">Category: {{$product->category}}</p>
            <p class="productStock">Stock: {{$product->stock}}</p>
            <div class="form-group productForm">
                <label for="">Select Quantity</label>

                <form action="{{url('/addcart/'.$product->id)}}">
                    <select value="" name='qty' class="form-control">


                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>

                    </select>

                    @csrf
                    <button class="addToCartBtn">Add To Cart</button>
                </form>
            </div>




        </div>


    </div>


</div>


@stop