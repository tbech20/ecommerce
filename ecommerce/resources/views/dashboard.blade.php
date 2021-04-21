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

    <div class="dashboardDataContainer">

        <div class="data">

            <p class="dataHeading">Total Order</p>
            <p>{{$ordersCount}}</p>

        </div>

        <div class="data">

            <p class="dataHeading">Total Earned</p>
            <p>${{$totalEarned}}</p>

        </div>


        <div class="data">

            <p class="dataHeading">Total Subscribes</p>
            <p>{{$subscriberCount}}</p>

        </div>

        <div class="data">

            <p class="dataHeading">Total Products</p>
            <p>{{$productsCount}}</p>

        </div>



    </div>

    <div class="dashboardGraphSection">

        <canvas id="myChart"></canvas>

    </div>


</div>


@stop


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type='text/javascript'>
    let myChart = document.querySelector('#myChart');




    const barChart = new Chart(myChart, {



        type: 'line',
        data: {

            labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21],
            datasets: [{
                label: '',
                data: ["{{$recordsArray[20]}}", "{{$recordsArray[19]}}", "{{$recordsArray[18]}}", "{{$recordsArray[17]}}",
                    "{{$recordsArray[16]}}", "{{$recordsArray[15]}}", "{{$recordsArray[14]}}", "{{$recordsArray[13]}}",
                    "{{$recordsArray[12]}}", "{{$recordsArray[11]}}", "{{$recordsArray[10]}}",
                    "{{$recordsArray[9]}}", "{{$recordsArray[8]}}", "{{$recordsArray[7]}}", "{{$recordsArray[6]}}", "{{$recordsArray[5]}}", "{{$recordsArray[4]}}",
                    "{{$recordsArray[3]}}", "{{$recordsArray[2]}}", "{{$recordsArray[1]}}", "{{$todaysRecordCount}}",
                ],
                fill: false,
                tension: 0.1,
                backgroundColor: "rgba(115, 96, 235, 0.57)",
                borderColor: '#715eeb',
                fill: true,


            }, ],



        },
        options: {}

    })
</script>

@stop