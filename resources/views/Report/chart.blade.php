@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Program Bar Chart -->
        <div class="col-lg-12 mb-3">
            <div class="card border shadow" style="height: 100%">
                <div class="card-body">
                    <div id="chart-program-container"></div>
                    <div class="col-lg-12">
                        <form action="{{ route('superadmin.export.userProgram') }}" method="post">
                            @csrf
                            <label for="program_id" class="form-label">Program:</label>
                            <select name="program_id" id="program_id" class="form-select">
                                @foreach($listOfProgram as $program)
                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                                @endforeach
                            </select>
                            <input type="submit" value="export" class="btn btn-primary mt-1">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Course Bar Chart -->
        <div class="col-lg-6">
            <div class="card border shadow" style="height: 100%">
                <div class="card-body">
                    <div id="chart-course-container"></div>
                    <div class="col-lg-12">
                        <form action="{{ route('superadmin.export.userCourse') }}" method="post">
                            @csrf
                            <label for="admin_course" class="form-label">Course:</label>
                            <select name="admin_course" id="admin_course" class="form-select mb-3">
                                <option value="">Select Course</option>
                                @foreach($listOfCourse as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                            <input type="submit" value="export" class="btn btn-primary mt-1">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pie Chart and Course Selector -->
        <div class="col-lg-6">
            <div class="card border shadow" style="height: 100%">
                <div class="card-body">
                    <select id="courseSelect" class="form-select mb-3">
                        <option value="">Select Course</option>
                        @foreach($listOfCourse as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                    <div id="chart-pie-container"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    function renderChart(containerId, chartType, title, labels, data) {
        if (!labels.length || !data.length) {
            labels = ['No Data'];
            data = [0];
            title += " - No data available";
        }

        Highcharts.chart(containerId, {
            chart: { type: chartType },
            title: { text: title },
            xAxis: chartType === 'bar' ? { categories: labels } : {},
            series: [{
                name: 'Number of officers',
                colorByPoint: true,
                data: labels.map((label, index) => ({ name: label, y: data[index] }))
            }]
        });
    }

    $(document).ready(function() {
        // Initialize bar charts with default data on page load
        renderChart(
            'chart-program-container', 
            '{{ $usersPerProgram["chartType"] }}', 
            '{{ $usersPerProgram["title"] }}', 
            {!! json_encode($usersPerProgram["labels"]) !!}, 
            {!! json_encode($usersPerProgram["data"]) !!}
        );

        renderChart(
            'chart-course-container', 
            '{{ $usersPerCourse["chartType"] }}', 
            '{{ $usersPerCourse["title"] }}', 
            {!! json_encode($usersPerCourse["labels"]) !!}, 
            {!! json_encode($usersPerCourse["data"]) !!}
        );

        // Update pie chart based on course selection
        $('#courseSelect').change(function() {
            const courseId = $(this).val();
            if (courseId) {
                $.ajax({
                    url: '{{ route("superadmin.report.courseData") }}',
                    data: { course_id: courseId },
                    success: function(data) {
                        renderChart(
                            'chart-pie-container',
                            data.chartType,
                            data.title,
                            data.labels,
                            data.data
                        );
                    },
                    error: function(xhr, status, error) {
                        console.error("An error occurred: " + error);
                    }
                });
            }
        });
    });
</script>
@endsection