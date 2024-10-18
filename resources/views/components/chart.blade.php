@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card border shadow">
                <div class="card-body">
                    <div id="chart-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        Highcharts.chart('chart-container', {
            chart: {
                type: 'bar'
            },
            title: {
                text: '{{ $usersPerProgram['title'] }}'
            },
            xAxis: {
                categories: {!! json_encode($usersPerProgram['labels']) !!}
            },
            yAxis: {
                title: {
                    text: 'Number of Users'
                }
            },
            series: [{
                name: 'Number of Users',
                data: {!! json_encode($usersPerProgram['data']) !!}
            }]
        });
    });
</script>
@endsection
