@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card border shadow" style="height: 100%">
                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <div id="chart-program-container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card border shadow" style="height: 100%">
                        <div class="card-body">
                            <div id="chart-training-container"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card border shadow">
                                <div class="card-body" >
                                <div id="chart-investigation-container"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="card border shadow">
                                <div class="card-body">
                                    <div id="chart-intelligence-container"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
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
    function renderChart(containerId, chartType, title, labels, data, width = null, height = 400) {
        if (chartType === 'pie') {
            Highcharts.chart(containerId, {
                chart: {
                    type: chartType,
                    width: width,
                    height: height 
                },
                title: {
                    text: title
                },
                series: [{
                    name: 'Number of officer',
                    colorByPoint: true,
                    data: labels.map(function(label, index) {
                        return { name: label, y: data[index] };
                    })
                }]
            });
        } else {
            Highcharts.chart(containerId, {
                chart: {
                    type: chartType,
                    width: width,
                    height: height 
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
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Render the chart for users per program
        renderChart(
            'chart-program-container', 
            '{{ $usersPerProgram["chartType"] }}', 
            '{{ $usersPerProgram["title"] }}', 
            {!! json_encode($usersPerProgram["labels"]) !!}, 
            {!! json_encode($usersPerProgram["data"]) !!},
            1300,
        );

        // Render the chart for users per training
        renderChart(
            'chart-training-container', 
            '{{ $usersPerCourse["chartType"] }}', 
            '{{ $usersPerCourse["title"] }}', 
            {!! json_encode($usersPerCourse["labels"]) !!}, 
            {!! json_encode($usersPerCourse["data"]) !!},
            800,
            650
        );

        // Render the chart for user investigation
        renderChart(
            'chart-investigation-container', 
            '{{ $userInvestigation["chartType"] }}', 
            '{{ $userInvestigation["title"] }}', 
            {!! json_encode($userInvestigation["labels"]) !!}, 
            {!! json_encode($userInvestigation["data"]) !!},
            550,
            300
        );

        // Render the chart for user investigation
        renderChart(
            'chart-intelligence-container', 
            '{{ $userIntelligence["chartType"] }}', 
            '{{ $userIntelligence["title"] }}', 
            {!! json_encode($userIntelligence["labels"]) !!}, 
            {!! json_encode($userIntelligence["data"]) !!},
            550,
            300
        );
    });
</script>
@endsection
