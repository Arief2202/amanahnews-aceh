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
    @if(Auth::user()->role == 0)

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    @else
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="row">
                <div class="col-lg mt-3">
                    <div class="bg-dark2 dark:bg-gray-800 mx-xl-0 mx-4" style="border-radius: 15px">
                        <div class="row">
                            <div class="col-5 m-auto d-flex justify-content-center">
                                <i class='bx bx-show' style="font-size: 50px;"></i>
                            </div>
                            <div class="col-7 p-2">
                                <div class="div mt-3">
                                    <h5 style="font-size: 14px;">Total Views</h5>
                                    <?php
                                        $val = $totalViews;
                                        $divider = "";
                                        $valPrint = "";
                                        if($val > 1000000000){
                                            $valPrint = number_format((float)($val/1000000000), 2, '.', '')." M";
                                        }
                                        else if($val > 1000000){
                                            $valPrint = number_format((float)($val/1000000), 2, '.', '')." Jt";
                                        }
                                        else if($val > 1000){
                                            $valPrint = number_format((float)($val/1000), 2, '.', '')." Rb";
                                        }
                                        else{
                                            $valPrint = $val;
                                        }
                                        
                                    ?>
                                    <p style="color:#2CAFFE; font-weight:700; font-size:18px;">{{$valPrint}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg mt-3">
                    <div class="bg-dark2 dark:bg-gray-800 mx-xl-0 mx-4" style="border-radius: 15px">
                        <div class="row">
                            <div class="col-5 m-auto d-flex justify-content-center">
                                <i class='bx bx-detail' style="font-size: 50px;"></i>
                            </div>
                            <div class="col-7 p-2">
                                <div class="div mt-3">
                                    <h5 style="font-size: 14px;">Berita</h5>
                                    <?php
                                        $val = $totalBerita;
                                        $divider = "";
                                        $valPrint = "";
                                        if($val > 1000000000){
                                            $valPrint = number_format((float)($val/1000000000), 2, '.', '')." M";
                                        }
                                        else if($val > 1000000){
                                            $valPrint = number_format((float)($val/1000000), 2, '.', '')." Jt";
                                        }
                                        else if($val > 1000){
                                            $valPrint = number_format((float)($val/1000), 2, '.', '')." Rb";
                                        }
                                        else{
                                            $valPrint = $val;
                                        }
                                        
                                    ?>
                                    <p style="color:#2CAFFE; font-weight:700; font-size:18px;">{{$valPrint}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg mt-3">
                    <div class="bg-dark2 dark:bg-gray-800 mx-xl-0 mx-4" style="border-radius: 15px">
                        <div class="row">
                            <div class="col-5 m-auto d-flex justify-content-center">
                                <i class='bx bx-store-alt' style="font-size: 50px;"></i>
                            </div>
                            <div class="col-7 p-2">
                                <div class="div mt-3">
                                    <h5 style="font-size: 14px;">Catalog</h5>
                                    <?php
                                        $val = $totalCatalog;
                                        $divider = "";
                                        $valPrint = "";
                                        if($val > 1000000000){
                                            $valPrint = number_format((float)($val/1000000000), 2, '.', '')." M";
                                        }
                                        else if($val > 1000000){
                                            $valPrint = number_format((float)($val/1000000), 2, '.', '')." Jt";
                                        }
                                        else if($val > 1000){
                                            $valPrint = number_format((float)($val/1000), 2, '.', '')." Rb";
                                        }
                                        else{
                                            $valPrint = $val;
                                        }
                                        
                                    ?>
                                    <p style="color:#2CAFFE; font-weight:700; font-size:18px;">{{$valPrint}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg mt-3">
                    <div class="bg-dark2 dark:bg-gray-800 mx-xl-0 mx-4" style="border-radius: 15px">
                        <div class="row">
                            <div class="col-5 m-auto d-flex justify-content-center">
                                <i class='bx bx-calendar' style="font-size: 50px;"></i>
                            </div>
                            <div class="col-7 p-2">
                                <div class="div mt-3">
                                    <h5 style="font-size: 14px;">Acara</h5>
                                    <?php
                                        $val = $totalAcara;
                                        $divider = "";
                                        $valPrint = "";
                                        if($val > 1000000000){
                                            $valPrint = number_format((float)($val/1000000000), 2, '.', '')." M";
                                        }
                                        else if($val > 1000000){
                                            $valPrint = number_format((float)($val/1000000), 2, '.', '')." Jt";
                                        }
                                        else if($val > 1000){
                                            $valPrint = number_format((float)($val/1000), 2, '.', '')." Rb";
                                        }
                                        else{
                                            $valPrint = $val;
                                        }
                                        
                                    ?>
                                    <p style="color:#2CAFFE; font-weight:700; font-size:18px;">{{$valPrint}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg mt-3">
                    <div class="bg-dark2 dark:bg-gray-800 mx-xl-0 mx-4" style="border-radius: 15px">
                        <div class="row">
                            <div class="col-5 m-auto d-flex justify-content-center">
                                <i class='bx bx-slideshow' style="font-size: 50px;"></i>
                            </div>
                            <div class="col-7 p-2">
                                <div class="div mt-3">
                                    <h5 style="font-size: 14px;">Video</h5>
                                    <?php
                                        $val = $totalVideo;
                                        $divider = "";
                                        $valPrint = "";
                                        if($val > 1000000000){
                                            $valPrint = number_format((float)($val/1000000000), 2, '.', '')." M";
                                        }
                                        else if($val > 1000000){
                                            $valPrint = number_format((float)($val/1000000), 2, '.', '')." Jt";
                                        }
                                        else if($val > 1000){
                                            $valPrint = number_format((float)($val/1000), 2, '.', '')." Rb";
                                        }
                                        else{
                                            $valPrint = $val;
                                        }
                                        
                                    ?>
                                    <p style="color:#2CAFFE; font-weight:700; font-size:18px;">{{$valPrint}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="">
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
    @endif
</x-app-layout>
