@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card border shadow" style="height: 100%">
                <div class="card-body">
                    <div id="chart-program-container"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border shadow">
                        <div class="card-body">
                            <div id="chart-training-container"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card border shadow">
                                <div class="card-body">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="card border shadow">
                                <div class="card-body">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="card border shadow">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border shadow">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border shadow">
                        <div class="card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    function renderChart(containerId, chartType, title, labels, data) {
        Highcharts.chart(containerId, {
            chart: {
                type: chartType
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
            '{{ $usersPerProgram["chartType"] }}', 
            '{{ $usersPerProgram["title"] }}', 
            {!! json_encode($usersPerProgram["labels"]) !!}, 
            {!! json_encode($usersPerProgram["data"]) !!}
        );

        // Render the chart for users per training
        renderChart(
            'chart-training-container', 
            '{{ $usersPerTraining["chartType"] }}', 
            '{{ $usersPerTraining["title"] }}', 
            {!! json_encode($usersPerTraining["labels"]) !!}, 
            {!! json_encode($usersPerTraining["data"]) !!}
        );
    });
</script>
@endsection
