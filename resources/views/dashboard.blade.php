@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('main-content')


    {{-- {{$ordersByStatus}} --}}

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Over all orders status</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="ordersStats"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col">
                @permission('view-payments-chart')

                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Payments</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="paymentsStats"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

                        </div>
                    </div>


                    @endpermission
                </div>
            </div>
        </div>



    @endsection

@section('scripts')
    <script>
        var orders_statuses = Array();
        var orders_counts = Array();
        var amounts = Array();
        $.get("dashboard/stats", function(data, status) {

            const body = JSON.parse(data);
            ordersByStatus = body.ordersByStatus;
            amounts = body.paymentsSummary;
            ordersByStatus.forEach(element => {
                orders_statuses.push(element.status);
                orders_counts.push(element.orders_count);
            });
            drawOrdersStatsDoughnutChart();
            drawPaymentsAmountBarChart();


        });


        function drawOrdersStatsDoughnutChart() {
            var ctx = document.getElementById('ordersStats').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    labels: orders_statuses,
                    datasets: [{
                        label: 'Order Statuses',
                        data: orders_counts,
                        // data: {{ $ordersDoughnutData }}
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }


        function drawPaymentsAmountBarChart() {
            const labels = ["January", "February", "March", "April", "May", "June", "July",
                "August", "September", "October", "November", "December"
            ];
            var barChartCanvas = $('#paymentsStats').get(0).getContext('2d')
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Payments',
                    data: amounts,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            };

            new Chart(barChartCanvas, {
                type: 'bar',
                data: data,
            })

        }
    </script>
@endsection
