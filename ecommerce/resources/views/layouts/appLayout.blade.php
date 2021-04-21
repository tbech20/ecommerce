<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpg" href="https://images.unsplash.com/photo-1496200186974-4293800e2c20?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80" />

    <title>E-commerce</title>

    <!-- Styles -->
    <link href="{{asset('/css/mainStyles.css')}}" rel="stylesheet">
    <link href="{{asset('/css/fontawesome.min.css')}}" rel="stylesheet">
    @yield('styles')
    <!-- Styles -->


    <!-- Bootstrap Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Bootstrap  Styles -->

    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!-- Font awesome -->

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Fonts -->


</head>

<body class="antialiased">

    <div class="mainContainer">

        <!-- Top header -->
        <div class="topHeaderContainer">
            <div class="topHeader">

                <div class="topHeaderLeft">

                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-instagram"></i>

                    <div class="phoneNumberContainer">
                        <i class="fas fa-phone-alt"></i>
                        <p>(+0081236453)</p>

                    </div>



                </div>

                <div class="topHeaderRight">

                    <!-- <div class="topHeaderOption">

                        <p>Settings</p>
                        <i class="fas fa-chevron-down"></i>

                    </div>


                    <div class="topHeaderOption">

                        <p>USD$</p>
                        <i class="fas fa-chevron-down"></i>

                    </div>

                    <div class="topHeaderOption">

                        <p>Language</p>
                        <i class="fas fa-chevron-down"></i>

                    </div> -->

                </div>


            </div>

        </div>
        <!-- Top header -->

        <!-- Main header -->



        <div class="mainHeaderContainer">


            <div class="mainHeader">

                <div class="mainHeaderLeft">

                    <a href="{{url('/')}}">
                        <img src="{{asset('images/logo.png')}}" alt="Logo">
                    </a>
                </div>

                <div class="mainHeaderMiddle">

                    <a href="{{url('/')}}">
                        <div class="mainHeaderOption">

                            <p>HOME</p>


                        </div>
                    </a>
                    <a href="#shopProducts">
                        <div class="mainHeaderOption">

                            <p>SHOP</p>
                            <i class="fas fa-chevron-down"></i>

                        </div>
                    </a>
                    <div class="mainHeaderOption">

                        <p>CONTACT US</p>


                    </div>


                </div>
                <div class="dropdown">

                    <div class="mainHeaderRight">


                        <a class="headerA" href="{{url('/checkout')}}"> <i class="fas fa-shopping-cart"></i> </a>


                        @if(!empty($totalProducts))


                        <p class="cartCount">{{$totalProducts}}</p>


                        @endif




                        <button class="burgerButton" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Main header -->

        @yield('content')




        <!-- Footer -->


        <div class="footerContainer">

            <div class="footer">

                <div class="footerLeft">

                    <img src="{{asset('images/logo.png')}}" alt="">

                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>


                    <div class="footerIconsContainer">

                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-youtube"></i>
                        <i class="fab fa-instagram"></i>


                    </div>

                </div>

                <div class="footerRight">


                    <div class="footerLinksContainer">


                        <h2>Information</h2>

                        <div class="linkLines">
                            <p class="linkLine"></p>
                            <p class="linkLineGray"></p>
                        </div>


                        <div class="links">


                            <a href="{{url('/contact')}}">
                                <p>About Us</p>
                            </a>
                            <a href="{{url('/contact')}}">
                                <p>Contact Us</p>
                            </a>
                            <!-- <p>News</p> -->



                        </div>




                    </div>



                    <div class="footerLinksContainer">


                        <h2>News Letter</h2>

                        <div class="linkLines">
                            <p class="linkLine"></p>
                            <p class="linkLineGray"></p>
                        </div>


                        <div class="links">


                            <p>Subcribe to the TheFace mailing list to receive update on mnew arrivals, special offers and other discount information.
                            </p>




                        </div>

                        <form action="{{url('/subscribe')}}" method="POST">
                            @csrf
                            <div class="newsLetter">

                                <input type="email" name='email' required placeholder="Your email address">
                                <button>Sign Up</button>


                            </div>

                        </form>

                    </div>





                </div>







            </div>


        </div>



        <!-- Footer -->


        <!-- Bottom Footer -->

        <div class="bottomFooterContainer">


            <div class="bottomFooter">

                <p>Copyright © HasThemes. All Rights Reserved</p>



            </div>
        </div>

        <!-- -->



    </div>




    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

    @yield('scripts')

</body>

</html>