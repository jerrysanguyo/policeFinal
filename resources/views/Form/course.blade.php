<span class="fs-4">MANDATORY COURSE/TRAINING:</span>
<form action="{{ route($baseRoute . '.course.store') }}" method="post">
    @csrf
    <div class="course-set">
        <div class="row mt-3">
            <div class="col-lg-12 col-md-12">
                <label for="program" class="form-label">Program:</label>
                <select name="program[]" class="form-select program-select">
                    <option value="">Select a Program</option>
                    @foreach($listOfProgram as $program)
                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <label for="class_number" class="form-label">Class number:</label>
                <input type="text" name="class_number[]" class="form-control">
            </div>
            <div class="col-lg-4 col-md-4">
                <label for="duration" class="form-label">Duration of training:</label>
                <input type="number" name="duration[]" class="form-control">
            </div>
            <div class="col-lg-4 col-md-4">
                <label for="rank" class="form-label">Rank in final order of merit (overall):</label>
                <input type="number" name="rank[]" class="form-control">
            </div>
        </div>
    </div>
    <div id="additional-sets"></div>
    <div class="row mt-3">
        <div class="col-lg-12 col-md-12">
            <input type="submit" value="submit" class="btn btn-primary">
        </div>
    </div>
    <div class="mt-3">
        <button type="button" id="add-set" class="btn btn-secondary">Add course/program</button>
    </div>
</form>

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
