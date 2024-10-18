@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card border shadow">
                <div class="card-body">
                    <div id="chart-program-container"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border shadow">
                <div class="card-body">
                    <div id="chart-training-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    function renderChart(containerId, title, labels, data) {
        Highcharts.chart(containerId, {
            chart: {
                type: 'bar'
            },
            title: {
                text: title
            },
            xAxis: {
                categories: labels
            },
            yAxis: {
                title: {
                    text: 'Number of officer'
                }
            },
            series: [{
                name: 'Number of officer',
                data: data
            }]
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Render the chart for users per program
        renderChart(
            'chart-program-container', 
            '{{ $usersPerProgram["title"] }}', 
            {!! json_encode($usersPerProgram["labels"]) !!}, 
            {!! json_encode($usersPerProgram["data"]) !!}
        );

        // Render the chart for users per training
        renderChart(
            'chart-training-container', 
            '{{ $usersPerTraining["title"] }}', 
            {!! json_encode($usersPerTraining["labels"]) !!}, 
            {!! json_encode($usersPerTraining["data"]) !!}
        );
    });
</script>
@endsection
