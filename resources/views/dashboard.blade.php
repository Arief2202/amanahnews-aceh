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
                    <div class="mb-3" id="container" style="width:100%; height:400px;"></div>
                    <div class="mb-3" id="containerWeek" style="width:100%; height:400px;"></div>
                    <div class="mb-3" id="containerMonth" style="width:100%; height:400px;"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="\vendor\highcharts-11.4.3\highcharts.js"></script>
    <script type="text/javascript">
    
        document.addEventListener('DOMContentLoaded', function () {
        const month = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ];
        var categoriesName = [];
        var value = [];
        for(var a = 0; a < 30; a++){
            categoriesName[a] = '2024 Jun '+ (a+1);
            value[a] = Math.floor(Math.random() * 1000);
        }
        console.log(categoriesName);
        const chart = Highcharts.chart('container', {
            chart: {
                type: 'column'
            },  
            title: {
                text: 'View Daily'
            },
            xAxis: {
                categories: categoriesName
            },
            yAxis: {
                title: {
                    text: 'Total Views'
                }
            },
            series: [{
                data: value
            }]
        });
        const chart2 = Highcharts.chart('containerWeek', {
            chart: {
                type: 'column'
            },  
            title: {
                text: 'View Weekly'
            },
            xAxis: {
                categories: categoriesName
            },
            yAxis: {
                title: {
                    text: 'Total Views'
                }
            },
            series: [{
                data: value
            }]
        });
        const chart3 = Highcharts.chart('containerMonth', {
            chart: {
                type: 'column'
            },  
            title: {
                text: 'View Monthly'
            },
            xAxis: {
                categories: categoriesName
            },
            yAxis: {
                title: {
                    text: 'Total Views'
                }
            },
            series: [{
                data: value
            }]
        });
    });
    </script>
</x-app-layout>
