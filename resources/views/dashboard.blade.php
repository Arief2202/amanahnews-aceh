<?php
    $month = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="row mb-3">
                        <div class="col-xl">
                            <label for="exampleInputEmail1" class="form-label">View Statistics</label>
                            <select class="form-select" aria-label="Default select example" name="view_mode" id="view_mode" onchange="updateChart()">
                                <option value="daily" @if(isset($_GET['view']) && $_GET['view'] == 'daily') selected @endif>Daily</option>
                                <option value="weekly" @if(isset($_GET['view']) && $_GET['view'] == 'weekly') selected @endif>Weekly</option>
                                <option value="monthly" @if(isset($_GET['view']) && $_GET['view'] == 'monthly') selected @endif>Monthly</option>
                              </select>
                        </div>
                        <div class="col-xl">
                            <label for="exampleInputEmail1" class="form-label">Year</label>
                            <select class="form-select" aria-label="Default select example" name="year" id="year" onchange="updateChart()">
                                @for($a = date('Y')-10; $a <= date('Y'); $a++)
                                <option value="{{$a}}" @if(isset($_GET['year']) && $_GET['year'] == (string) $a) selected @elseif(!isset($_GET['year']) && $a == date('Y')) selected @endif>{{$a}}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-xl" id="monthView">
                            <label for="exampleInputEmail1" class="form-label">Month</label>
                            <select class="form-select" aria-label="Default select example" name="month" id="month" onchange="updateChart()">
                                @for($a = 1; $a <= 12; $a++)
                                <option value="{{$a}}" @if(isset($_GET['month']) && $_GET['month'] == (string) $a) selected @elseif(!isset($_GET['month']) && $a == date('m')) selected @endif>{{$month[$a-1]}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="mb-3" id="container" style="width:100%; height:400px;"></div>
                    {{-- <div class="mb-3" id="containerWeek" style="width:100%; height:400px;"></div>
                    <div class="mb-3" id="containerMonth" style="width:100%; height:400px;"></div> --}}
                </div>
            </div>
        </div>
    </div>
    <script src="\vendor\highcharts-11.4.3\highcharts.js"></script>
    <script type="text/javascript">
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        var mode = document.getElementById('view_mode').value;
        var yearVal = document.getElementById('year').value;
        var monthView = document.getElementById('monthView');
        var monthVal = document.getElementById('month').value;

        if(urlParams.get('view') == 'monthly'){
            monthView.style.display = 'none';
        }
        else{
            monthView.style.display = 'block';
        }

        function updateChart(){
            var mode = document.getElementById('view_mode').value;
            var year = document.getElementById('year').value;
            var monthView = document.getElementById('monthView');
            var month = document.getElementById('month').value;
            
            window.location.href="/dashboard?view="+mode+"&year="+year+"&month="+month;
        }

        fetch("/member/statistics/get?mode="+mode+"&year="+yearVal+"&month="+monthVal)
		.then(response => response.json())
		.then(data => {		
            
            const chart = Highcharts.chart('container', {
                chart: {
                    type: 'column',
                    backgroundColor: 'transparent',
                    color: '#ffffff',
                },  
                title: {
                    text: data.title,
                    style:{
                        color: "#ffffff"
                    }
                },
                xAxis: {
                    categories: data.categoriesName,
                    labels:{
                        style:{
                            color: "#ffffff"
                        }
                    }
                },
                yAxis: {
                    title: {
                        text: 'Total Views',
                        style:{
                            color: "#ffffff"
                        }
                    },
                    labels:{
                        style:{
                            color: "#ffffff"
                        }
                    }
                },
                series: [{
                    data: data.value,
                    style:{
                        color: "#ffffff"
                    }
                }]
            });
		});
    </script>
</x-app-layout>
