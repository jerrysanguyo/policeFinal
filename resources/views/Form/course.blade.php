<span class="fs-4">MANDATORY COURSE/TRAINING:</span>
<form action="{{ route($baseRoute . '.course.store') }}" method="post">
    @csrf
    <div class="course-set">
        <div class="row mt-3">
            <div class="col-lg-12 col-md-12">
                <label for="program_id" class="form-label">Program:</label>
                <select name="program_id[]" id="program_id" class="form-select program-select">
                    <option value="">Select a Program</option>
                    @foreach($listOfProgram as $program)
                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-4">
                <label for="class_number" class="form-label">Class number:</label>
                <input type="text" name="class_number[]" id="class_number" class="form-control">
            </div>
            <!-- <div class="col-lg-4 col-md-4">
                <label for="duration" class="form-label">Duration of training:</label>
                <input type="number" name="duration[]" id="duration" class="form-control">
            </div> -->
            <div class="col-lg-6 col-md-4">
                <label for="ranking" class="form-label">Rank in final order of merit (overall):</label>
                <input type="number" name="ranking[]" id="ranking" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <label for="start_date" class="form-label">Start date:</label>
                <input type="date" name="start_date[]" id="start_date" class="form-control">
            </div>
            <div class="col-lg-6 col-md-6">
                <label for="end_date" class="form-label">End date:</label>
                <input type="date" name="end_date[]" id="end_date" class="form-control">
            </div>
        </div>
    </div>
    <div id="additional-sets"></div>
    @if(!$userCourseExn)
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <label for="high_training" class="form-label">Highes mandatory training:</label>
            <select name="high_training" id="high_training" class="form-select">
                    @foreach($listOfProgram as $program)
                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                    @endforeach
            </select>
        </div>
        <div class="col-lg-4 col-md-4">
            <label for="date_graduation" class="form-label">Date graduated:</label>
            <input type="date" name="date_graduation" id="date_graduation" class="form-control">
        </div>
        <div class="col-lg-4 col-md-4">
            <label for="order_merit" class="form-label">Order of merit</label>
            <input type="number" name="order_merit" id="order_merit" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <label for="ftoc" class="form-label">FTOC for (PSOAC & PSSLC only):</label>
            <select name="ftoc" id="ftoc" class="form-select">
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-4">
            <label for="qe_result" class="form-label">QE result:</label>
            <select name="qe_result" id="qe_result" class="form-select">
                <option value="passed">Passed</option>
                <option value="failed">Failed</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-4">
            <label for="date_qualifying" class="form-label">Date of qualifying exam:</label>
            <input type="date" name="date_qualifying" id="date_qualifying" class="form-control">
        </div>
    </div>
    @endif
    <div class="row mt-3">
        <div class="col-lg-12 col-md-12">
            <div class="d-flex justify-content-between">
                <input type="submit" value="Submit" class="btn btn-primary">
                <button type="button" id="add-set" class="btn btn-secondary">Add course/program</button>
            </div>
        </div>
    </div>
</form>
<!-- if user has data in Course extension table this will appear -->
@if($userCourseExn)
    <hr>
    <div class="row mt-3">
        <form action="{{ route($baseRoute . '.courseExn.update', ['courseExn' => $userCourseExn->id]) }}" method="get">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <label for="high_training" class="form-label">Highes mandatory training:</label>
                    <select name="high_training" id="high_training" class="form-select">
                            @foreach($listOfProgram as $program)
                            <option value="{{ $program->id }}" {{ $userCourseExn && $userCourseExn->high_training === $program->id ? 'selected' : '' }}>{{ $program->name }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="col-lg-4 col-md-4">
                    <label for="date_graduation" class="form-label">Date graduated:</label>
                    <input type="date" name="date_graduation" id="date_graduation" class="form-control" value="{{ $userCourseExn->date_graduation }}">
                </div>
                <div class="col-lg-4 col-md-4">
                    <label for="order_merit" class="form-label">Order of merit</label>
                    <input type="number" name="order_merit" id="order_merit" class="form-control" value="{{ $userCourseExn->order_merit }}">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <label for="ftoc" class="form-label">FTOC for (PSOAC & PSSLC only):</label>
                    <select name="ftoc" id="ftoc" class="form-select">
                        <option value="yes" {{ $userCourseExn && $userCourseExn->ftoc === 'yes' ? 'selected' : '' }}>Yes</option>
                        <option value="no" {{ $userCourseExn && $userCourseExn->ftoc === 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label for="qe_result" class="form-label">QE result:</label>
                    <select name="qe_result" id="qe_result" class="form-select">
                        <option value="passed" {{ $userCourseExn && $userCourseExn->qe_result === 'passed' ? 'selected'  : '' }}>Passed</option>
                        <option value="failed" {{ $userCourseExn && $userCourseExn->qe_result === 'failed' ? 'selected'  : '' }}>Failed</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-4">
                    <label for="date_qualifying" class="form-label">Date of qualifying exam:</label>
                    <input type="date" name="date_qualifying" id="date_qualifying" class="form-control" value="{{ $userCourseExn->date_qualifying }}">
                </div>
                <div class="col-lg-2 col-md-2 d-flex align-items-end">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>
@endif
<!-- if you has data in Course table this will appear -->
@if($userCourse)
    @foreach($listOfCourse as $course)
        <form action="{{ route($baseRoute . '.course.update', ['course' => $course->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mt-3">
                <div class="col-lg-12 col-md-12">
                    <label for="program_id" class="form-label">Program:</label>
                    <select name="program_id" id="program_id" class="form-select program-select">
                        @foreach($listOfProgram as $program)
                        <option value="{{ $program->id }}" {{ $course && $course->program_id === $program->id ? 'selected' : '' }}>{{ $program->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <label for="class_number" class="form-label">Class number:</label>
                    <input type="text" name="class_number" id="class_number" class="form-control" value="{{ $course->class_number }}">
                </div>
                
                <div class="col-lg-2 col-md-2">
                    <label for="start_date" class="form-label">Start date:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $course->start_date }}">
                </div>
                <div class="col-lg-2 col-md-2">
                    <label for="end_date" class="form-label">End date:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $course->end_date }}">
                </div>
                <div class="col-lg-3 col-md-4">
                    <label for="ranking" class="form-label">Rank in final order of merit (overall):</label>
                    <input type="number" name="ranking" id="ranking" class="form-control" value="{{ $course->ranking }}">
                </div>
                <div class="col-lg-3 col-md-3 d-flex align-items-end">
                    <div class="d-flex">
                        <input type="submit" value="Update" class="btn btn-primary mx-1">
        </form>
        <!-- 
            - did this to avoid conflict with 2 form.
            - attached the 2 closing div outside the first form to retain the design of the buttons.
         -->
                        <form action="{{ route($baseRoute .'.course.destroy', ['course' => $course->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Remove</button>
                        </form>
                    </div>
                </div>
            </div>
    @endforeach
@endif

<script>
    function updateProgramOptions() {
        const selectedPrograms = Array.from(document.querySelectorAll('.program-select'))
            .map(select => select.value)
            .filter(value => value);

        document.querySelectorAll('.program-select').forEach(select => {
            const currentValue = select.value;

            // Clear options and re-add
            select.querySelectorAll('option').forEach(option => {
                if (option.value && selectedPrograms.includes(option.value) && option.value !== currentValue) {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            });
        });
    }

    document.querySelectorAll('.program-select').forEach(select => {
        select.addEventListener('change', updateProgramOptions);
    });

    document.getElementById('add-set').addEventListener('click', function() {
        let originalSet = document.querySelector('.course-set').cloneNode(true);
        originalSet.querySelectorAll('input').forEach(input => input.value = '');
        
        let removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('btn', 'btn-danger', 'mt-2');
        removeButton.innerText = 'Remove This Set';
        removeButton.addEventListener('click', function() {
            originalSet.remove();
            updateProgramOptions();
        });

        originalSet.appendChild(removeButton);

        // Add event listener to new program-select
        const newSelect = originalSet.querySelector('.program-select');
        newSelect.addEventListener('change', updateProgramOptions);

        document.getElementById('additional-sets').appendChild(originalSet);
        updateProgramOptions();
    });

    // Initial call to update options
    updateProgramOptions();
</script>
