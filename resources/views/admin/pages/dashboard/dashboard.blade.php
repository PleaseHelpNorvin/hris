@extends('admin.layout.default_layout')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .box {
            height: 100px;
            background-color: rgb(255, 255, 255);
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;
            margin-bottom: 10px;
            text-decoration: none;
            text-decoration-color: black;
        }
        
        .custom-height {
            height: 300px;
        }

        .chart-container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            position: relative;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>

{{-- <div class="spacer" style="padding-top:%"> --}}
<div class="container-fluid" style="padding-top:5%; ">
    <div class="row flex-wrap">
        <!-- First Box -->
        <div class="col-md-6 col-sm-12 custom-height">
            <div class="card">
                <div class="card-body">
                    {{-- <h5 class="card-title">Counts</h5> --}}
                    <div class="row">
                        <!-- Six boxes inside the first box -->
                        <div class="col-6 col-md-4">
                            <a href="link_for_count_1" class="a">
                                <div class="box">static count 1</div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4">
                            <a href="link_for_count_1" class="a">
                                <div class="box">static count 1</div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4">
                            <a href="link_for_count_1" class="a">
                                <div class="box">static count 1</div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4">
                            <a href="link_for_count_1" class="a">
                                <div class="box">static count 1</div>
                            </a>
                        </div>
                        <div class="col-6 col-md-4">
                            <a href="link_for_count_1" class="a">
                                <div class="box">static count 1</div>
                            </a>
                        </div>
                        <!-- Repeat for other boxes -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Second Box -->
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Still static</h5>
                    <!-- Content for the second box (e.g., pie chart) -->
                    <div id="pie-chart">
                        <canvas id="myChart" style="width:100%;max-width:445px; margin: auto;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-4">
        <!-- Rectangle box below the first box -->
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Departments</h5>
                    <!-- Content for the rectangle box -->
                    <div class="row">
                        <!-- Column box for department count -->
                        <div class="col-12">
                            <div class="chart-container">
                                <canvas id="departmentsChart"></canvas>
                                <!-- Chart for departments -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fourth Box -->
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Employee Salaries</h5>
                    <!-- Content for the fourth box -->
                    <canvas id="myChart1" style="width:100%;max-width:400px; margin: 0 auto;"></canvas>
                    <!-- Center the chart -->
                </div>
            </div>
        </div>
    </div>
</div>
        <script>
            const xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
            const yValues = [55, 49, 44, 24, 15];
            const barColors = [
                "#b91d47",
                "#00aba9",
                "#2b5797",
                "#e8c3b9",
                "#1e7145"
            ];

            new Chart("myChart", {
                type: "doughnut",
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        //   text: "World Wide Wine Production 2018"
                    }
                }
            });

            new Chart("myChart1", {
                type: "pie", // Corrected chart type
                data: {
                    labels: xValues,
                    datasets: [{
                        backgroundColor: barColors,
                        data: yValues
                    }]
                },
                options: {
                    title: {
                        display: true,
                        //   text: "World Wide Wine Production 2018"
                    }
                }
            });
        </script>
        <script>
            const labels = ["January", "February", "March", "April", "May", "June", "July"];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Still static',
                    data: [65, 59, 80, 81, 56, 55, 40],
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

            const departmentsChartCanvas = document.getElementById('departmentsChart').getContext('2d');
            new Chart(departmentsChartCanvas, {
                type: 'bar',
                data: data
            });
        </script>
    @endsection
