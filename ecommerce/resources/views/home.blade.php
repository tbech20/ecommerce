@extends('layouts.appLayout')


@section('content')






<!-- Landing Page -->

<style>
    .carousel-item {
        position: relative;
        height: 840px;
    }

    .overlay-image {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-position: center;
        background-size: cover;
        background-image: url('{{asset("images/slide-1.jpg")}}');

    }

    .overlay1 {

        background-image: url('{{asset("images/slide-1.jpg")}}');
    }


    .overlay2 {
        background-image: url('{{asset("images/slide-1.jpg")}}');

    }

    .overlay3 {

        background-image: url('{{asset("images/slide-1.jpg")}}');

    }

    .carouselItemContent {
        position: relative;
        top: 30%;
        left: 15%;

    }

    .carouselItemContent>P {
        font-size: 20px;
        font-weight: 600;
    }


    .carouselItemContent>h2 {
        font-size: 65px;
        margin-top: 20px;
    }

    .carouselItemContent>h3 {
        font-size: 65px;
        margin-top: 20px;
        font-weight: 700;
    }

    .carouselItemContent>a {

        border: 1px solid #000;
        padding: 10px 20px 10px 20px;
        background-color: transparent;
        margin-top: 40px !important;
        transition: 180ms all ease-in;
        cursor: pointer;
        color: #000;
    }

    .carouselItemContent>a:hover {
        background-color: #715eeb;
        border: 1px solid #715eeb;
        color: #fff !important;
    }

    .carousel-control-prev-icon {

        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #000;


    }

    .prevIcon {

        width: 40px;
        height: 40px;
        background-color: #000;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: 50%;
        left: 2%;
        z-index: 100;
        opacity: 0.5;
        cursor: pointer;

    }

    .prevIcon>i {
        font-size: 15px;
        color: #fff;

    }

    .nextIcon {

        width: 40px;
        height: 40px;
        background-color: #000;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        top: 50%;
        left: 90%;
        z-index: 100;
        opacity: 0.5;
        cursor: pointer;

    }

    .nextIcon>i {
        font-size: 15px;
        color: #fff;

    }


    .prevIcon:hover {
        background-color: #715eeb;
        opacity: 1;

    }

    .nextIcon:hover {
        background-color: #715eeb;
        opacity: 1;

    }
</style>

<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active overlay1">


            <div class="carouselItemContent">

                <p>SOME RANDOM TEXT</p>
                <h2>Scalcare shampoo</h2>
                <h3>Sale 30% Off</h3>
                <a href='#shopProducts'>SHOP NOW</a>


            </div>




        </div>

        <div class="carousel-item overlay2">


            <div class="carouselItemContent">

                <p>SOME RANDOM TEXT</p>
                <h2>Scalcare shampoo</h2>
                <h3>Sale 30% Off</h3>
                <a href='#shopProducts'>SHOP NOW</a>


            </div>




        </div>

        <div class="carousel-item overlay2">


            <div class="carouselItemContent">

                <p>SOME RANDOM TEXT</p>
                <h2>Coolish Bag</h2>
                <h3>Sale 50% Off</h3>
                <a href='#shopProducts'>SHOP NOW</a>


            </div>




        </div>
    </div>

    <div class="prevIcon carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">

        <i class="fas fa-chevron-left"></i>

    </div>




    <div class="nextIcon carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">

        <i class="fas fa-chevron-right"></i>

    </div>

</div>




</div>
<!-- Landing Page -->

<!-- Banner -->

<div class="bannerContainer">


    <div class="banner">

        <div class="bannerItem">


            <img src="{{asset('images/2.png')}}" alt="">

            <div class="bannerItemInfo">

                <h3>Free Shipping</h3>
                <p>On all orders over $75.00</p>
            </div>

        </div>

        <div class="bannerItem">


            <img src="{{asset('images/3.png')}}" alt="">

            <div class="bannerItemInfo">

                <h3>Free Returns</h3>
                <p>On all orders over $75.00</p>
            </div>

        </div>

        <div class="bannerItem">


            <img src="{{asset('images/4.png')}}" alt="">

            <div class="bannerItemInfo">

                <h3>100% Payment Secure</h3>
                <p>On all orders over $75.00</p>
            </div>

        </div>

        <div class="bannerItem">


            <img src="{{asset('images/5.png')}}" alt="">

            <div class="bannerItemInfo">

                <h3>Support 24/7</h3>
                <p>On all orders over $75.00</p>
            </div>

        </div>

    </div>

</div>

<!-- Banner -->


<!-- Photos Section -->


<div class="photosContainer">

    <div class="photos">

        <div class="photo photo1">
            <img src="{{asset('images/photo1.jpg')}}" alt="">

        </div>

        <div class="photo photo2">
            <img src="{{asset('images/photo2.jpg')}}" alt="">

        </div>

        <div class="photo photo3">
            <img src="{{asset('images/photo3.jpg')}}" alt="">

        </div>



    </div>



</div>


<!-- Photos Section -->


<!-- Product Section -->

<h2 class="centerHeading" id="shopProducts">Our Products</h2>
<p class="headingLine"></p>
<p class="centerPara">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis, culpa?</p>

<!-- <div class="productsOptionContainer">

    <p class="productsOption productActive">New Products</p>
    <p class="productsOption">On sale</p>
    <p class="productsOption">Upcoming Products</p>

</div> -->


<div class="productsContainer">

    <div class="productsRow">
        <div class=" row">


            @foreach($products as $product)

            @if($product->type == 'newarrival')

            @continue

            @endif

            <div class="productCard">

                <img class='productImage' src="{{url('storage/images/'.$product->frontImage)}}" alt="">
                <div class="productDetails">
                    <p>{{$product->title}}</p>
                    <div class="starsContainer">
                        <i class="fas fa-star"></i>
                        {{$product->rating}}


                    </div>

                    <p class="productValue">${{$product->price}}</p>

                    <a class="cartIcon" href="{{url('/product/'.$product->id)}}">


                        <i class="fas fa-shopping-cart "></i>


                    </a>



                </div>

            </div>


            @endforeach










        </div>





    </div>




</div>

<div class="productLinksContainer">


    {{$products->links('productsLinks')}}


</div>


<!-- Product Section -->

<!-- New Arrival Product Section -->

<h2 class="centerHeading">New Arrival Products</h2>
<p class="headingLine"></p>
<p class="centerPara">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis, culpa?</p>

<!-- <div class="productsOptionContainer">

    <p class="productsOption productActive">New Products</p>
    <p class="productsOption">On sale</p>
    <p class="productsOption">Upcoming Products</p>

</div> -->


<div class="productsContainer">

    <div class="productsRow">
        <div class=" row">
            <!-- 
            <div class="productCard">

                <img class='productImage' src="{{asset('images/product.png')}}" alt="">
                <div class="productDetails">
                    <p>All in cloth washer washing machine!</p>
                    <div class="starsContainer">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>


                    </div>

                    <p class="productValue">$11.90</p>


                    <button class="cartIcon">
                        <i class="fas fa-shopping-cart "></i>
                    </button>




                </div>

            </div> -->

            <!-- <div class="productCard">

                <img class='productImage' src="{{asset('images/product.png')}}" alt="">
                <div class="productDetails">
                    <p>All in cloth washer washing machine!</p>
                    <div class="starsContainer">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>


                    </div>

                    <p class="productValue">$11.90</p>


                    <button class="cartIcon">
                        <i class="fas fa-shopping-cart "></i>
                    </button>




                </div>

            </div> -->
            <!-- 
            <div class="productCard">

                <img class='productImage' src="{{asset('images/product.png')}}" alt="">
                <div class="productDetails">
                    <p>All in cloth washer washing machine!</p>
                    <div class="starsContainer">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>


                    </div>

                    <p class="productValue">$11.90</p>


                    <button class="cartIcon">
                        <i class="fas fa-shopping-cart "></i>
                    </button>




                </div>

            </div> -->

            <!-- 
            <div class="productCard">

                <img class='productImage' src="{{asset('images/product.png')}}" alt="">
                <div class="productDetails">
                    <p>All in cloth washer washing machine!</p>
                    <div class="starsContainer">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>


                    </div>

                    <p class="productValue">$11.90</p>


                    <button class="cartIcon">
                        <i class="fas fa-shopping-cart "></i>
                    </button>




                </div>

            </div> -->


            @foreach($newArrivals as $newArrival)


            <div class="productCard">

                <img class='productImage' src="{{url('storage/images/'.$newArrival->frontImage)}}" alt="">
                <div class="productDetails">
                    <p>{{$newArrival->title}}</p>
                    <div class="starsContainer">
                        <i class="fas fa-star"></i>
                        {{$newArrival->rating}}


                    </div>

                    <p class="productValue">${{$newArrival->price}}</p>

                    <a class="cartIcon" href="{{url('/product/'.$newArrival->id)}}">


                        <i class="fas fa-shopping-cart "></i>


                    </a>



                </div>

            </div>

            @endforeach




        </div>
    </div>

</div>

<!-- New Arrival Product Section -->



@stop

@section('scripts')

<script type='text/javascript'>
    $(window).scroll(function(event) {
        let scrolledTop = $(window).scrollTop();

        if (scrolledTop > 170) {


            $('.mainHeaderContainer').css({
                position: 'fixed',
                zIndex: 2,
            });


        } else {

            $('.mainHeaderContainer').css({
                position: 'relative',

            });
        }

    });
</script>
@stop