<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Styles -->
    <link href="{{asset('/css/dashboardStyles.css')}}" rel="stylesheet">
    <!-- Styles -->
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Fonts -->
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <!-- Font awesome -->
    <!-- Bootstrap Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Bootstrap  Styles -->

</head>

<body>

    <div class="dashboardContainer">

        <div class="sidebar">

            <img class="dashboardLogo" src="{{asset('images/logo.png')}}" alt="">

            <div class="sidearSection">



                <div class="sidebarLinks">

                    <a class="<?php if ($page == 'dashboard') {
                                    echo "sidebarActive";
                                } ?>" href="{{asset('admin/dashboard')}}">Dashboard</a>
                    <a class="<?php

                                if ($page == 'addproduct') {
                                    echo "sidebarActive";
                                }

                                ?>" href="{{asset('admin/addproduct')}}">Add Product</a>

                    <a class="<?php

                                if ($page == 'allproducts') {
                                    echo "sidebarActive";
                                }
                                ?>" href="{{asset('admin/allproducts')}}">All Products</a>

                    <a class="<?php

                                if ($page == 'promocodes') {
                                    echo "sidebarActive";
                                }
                                ?>" href="{{asset('admin/promocodes')}}">Promo Codes</a>

                    <a class="<?php

                                if ($page == 'orders') {
                                    echo "sidebarActive";
                                }
                                ?>" href="{{asset('admin/orders')}}">Orders</a>


                    <a class="<?php

                                if ($page == 'tickets') {
                                    echo "sidebarActive";
                                }
                                ?>" href="{{asset('admin/tickets')}}">Tickets</a>


                    <a class="<?php

                                if ($page == 'subscribers') {
                                    echo "sidebarActive";
                                }
                                ?>" href="{{asset('admin/subscribers')}}">Subscribers</a>


                    <a class="<?php

                                if ($page == 'credentials') {
                                    echo "sidebarActive";
                                }
                                ?>" href="{{asset('admin/credentials')}}">Credentials</a>

                </div>

            </div>

        </div>

        @yield('content')


    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    @yield('scripts')

</body>

</html>