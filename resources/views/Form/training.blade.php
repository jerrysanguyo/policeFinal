<span class="fs-4">SPECIALIZED COURSE TRAINING:</span>
<form action="{{ route($baseRoute . '.training.store') }}" method="post">
    @csrf
    <div class="training-set">
        <!-- Initial Row Set -->
        <div class="row mt-3">
            <div class="col-lg-6 col-md-12">
                <label for="admin_course" class="form-label">Admin courses category:</label>
                <select name="admin_course[]" class="form-select admin-course-select">
                    <option value="">Choose ..</option>
                    @foreach($listOfSpecialCourse as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6 col-md-12">
                <label for="admin_training" class="form-label">Admin training course:</label>
                <select name="admin_training[]" class="form-select admin-training-select">
                    <option value="">Choose ..</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <label for="class_number" class="form-label">Class number:</label>
                <input type="text" name="class_number[]" id="class_number" class="form-control">
            </div>
            <div class="col-lg-4 col-md-12">
                <label for="start_date" class="form-label">Start date:</label>
                <input type="date" name="start_date[]" id="start_date" class="form-control">
            </div>
            <div class="col-lg-4 col-md-12">
                <label for="end_date" class="form-label">End date:</label>
                <input type="date" name="end_date[]" id="end_date" class="form-control">
            </div>
        </div>
    </div>
    
    <!-- Container for Additional Rows -->
    <div id="additional-training-sets"></div>

    <!-- Add and Submit Buttons -->
    <div class="row mt-3">
        <div class="col-lg-12 col-md-12">
            <div class="d-flex justify-content-between">
                <input type="submit" value="Submit" class="btn btn-primary">
                <button type="button" id="add-training-set" class="btn btn-secondary">Add Another Training</button>
            </div>
        </div>
    </div>
</form>

@if ($userTraining)
    <hr>
    @foreach ($getAllTraining as $training)
        <form action="{{ route($baseRoute . '.training.update', $training->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row mt-3">
                <div class="col-lg-6 col-md-12">
                    <label for="admin_course" class="form-label">Admin courses category:</label>
                    <select name="admin_course" class="form-select admin-course-select">
                        <option value="">Choose ..</option>
                        @foreach($listOfSpecialCourse as $course)
                            <option value="{{ $course->id }}" {{ $training && $training->admin_course === $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 col-md-12">
                    <label for="admin_training" class="form-label">Admin training course:</label>
                    <select name="admin_training" class="form-select admin-training-select" data-admin-training="{{ $training->admin_training }}">
                        <option value="">Choose ..</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-12">
                    <label for="class_number" class="form-label">Class number:</label>
                    <input type="text" name="class_number" id="class_number" class="form-control" value="{{ $training->class_number }}">
                </div>
                <div class="col-lg-3 col-md-12">
                    <label for="start_date" class="form-label">Start date:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $training->start_date }}">
                </div>
                <div class="col-lg-3 col-md-12">
                    <label for="end_date" class="form-label">End date:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $training->end_date }}">
                </div>
                <div class="col-lg-3 col-md-3 d-flex align-items-end">
                    <div class="d-flex">
                        <input type="submit" value="Update" class="mx-1 btn btn-primary">
        </form>
        <!-- same explanation with course.blade form -->
                        <form action="{{ route($baseRoute . '.training.destroy', $training->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this training?')">Remove</button>
                        </form>
                    </div>
                </div>
            </div>
    @endforeach
@endif
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Populates admin_training select based on admin_course select and preselects training if available
    async function populateAdminTraining(selectElement, courseId) {
        const adminTrainingSelect = selectElement.closest('.row').querySelector('.admin-training-select');
        const selectedTrainingId = adminTrainingSelect.getAttribute('data-admin-training');
        adminTrainingSelect.innerHTML = '<option value="">Choose ..</option>';

        if (courseId) {
            try {
                const response = await fetch(`/admin-trainings/${courseId}`);
                const trainings = await response.json();

                trainings.forEach(training => {
                    const option = document.createElement('option');
                    option.value = training.id;
                    option.textContent = training.name;

                    // Preselect if the ID matches the stored data attribute
                    if (training.id.toString() === selectedTrainingId) {
                        option.selected = true;
                    }

                    adminTrainingSelect.appendChild(option);
                });

                updateTrainingOptions();
            } catch (error) {
                console.error('Error fetching trainings:', error);
                alert('There was an error fetching the trainings.');
            }
        }
    }

    // Preselect on page load for existing entries
    document.querySelectorAll('.admin-course-select').forEach(select => {
        const courseId = select.value;
        if (courseId) {
            populateAdminTraining(select, courseId);
        }
    });

    // Add event listener to handle changes in admin_course selection
    document.querySelectorAll('.admin-course-select').forEach(select => {
        select.addEventListener('change', function () {
            populateAdminTraining(this, this.value);
        });
    });
    
    // Updates admin_training options to disable selected ones in other rows
    function updateTrainingOptions() {
        const selectedTrainings = Array.from(document.querySelectorAll('.admin-training-select'))
            .map(select => select.value)
            .filter(value => value);

        document.querySelectorAll('.admin-training-select').forEach(select => {
            const currentTraining = select.value;

            Array.from(select.options).forEach(option => {
                if (selectedTrainings.includes(option.value) && option.value !== currentTraining) {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            });
        });
    }

    // Add new training set row
    document.getElementById('add-training-set').addEventListener('click', () => {
        const newTrainingSet = document.querySelector('.training-set').cloneNode(true);
        newTrainingSet.querySelectorAll('input, select').forEach(input => input.value = '');

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('btn', 'btn-danger', 'mt-2');
        removeButton.textContent = 'Remove This Set';
        removeButton.addEventListener('click', () => {
            newTrainingSet.remove();
            updateTrainingOptions();
        });

        newTrainingSet.appendChild(removeButton);
        
        newTrainingSet.querySelector('.admin-course-select').addEventListener('change', function () {
            populateAdminTraining(this, this.value);
        });

        document.getElementById('additional-training-sets').appendChild(newTrainingSet);
    });

    // Initial populate and option disable for first set
    document.querySelectorAll('.admin-course-select').forEach(select => {
        select.addEventListener('change', function () {
            populateAdminTraining(this, this.value);
        });
    });

    updateTrainingOptions();
});
</script>
