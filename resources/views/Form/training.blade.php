<span class="fs-4">SPECIALIZED COURSE TRAINING:</span>
<form action="{{ route($baseRoute . '.training.storeOrUpdate') }}" method="post">
    @csrf
    <div class="row mt-3">
        <div class="col-lg-6 col-md-12">
            <label for="admin_course" class="form-label">Admin courses category:</label>
            <select name="admin_course" id="admin_course" class="form-select">
                <option value="">Choose ..</option>
                @foreach($listOfSpecialCourse as $course)
                    <option value="{{ $course->id }}"{{ $userTraining && $userTraining->admin_course === $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-6 col-md-12">
            <label for="admin_training" class="form-label">Admin training course:</label>
            <select name="admin_training" id="admin_training" class="form-select">
                <!-- auto-fill via js -->
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <label for="class_number" class="form-label">Class number:</label>
            <input type="text" name="class_number" id="class_number" class="form-control" value="{{ $userTraining->class_number ?? '' }}">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="start_date" class="form-label">Start date:</label>
            <input type="date" name="start_date" id="start_date" class="form-control">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="end_date" class="form-label">End date:</label>
            <input type="date" name="end_date" id="end_date" class="form-control">
        </div>
    </div>
    <input type="submit" value="Submit" class="btn btn-primary mt-3">
</form>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const adminCourseSelect = document.getElementById('admin_course');
        const adminTrainingSelect = document.getElementById('admin_training');
        const existingAdminTrainingId = '{{ $userTraining->admin_training ?? '' }}';

        console.log('Existing Admin Training ID:', existingAdminTrainingId); 

        async function populateAdminTraining(courseId) {
            adminTrainingSelect.innerHTML = '<option value="">Choose ..</option>';

            if (courseId) {
                try {
                    const response = await fetch(`/admin-trainings/${courseId}`);
                    const trainings = await response.json();

                    trainings.forEach(training => {
                        const option = document.createElement('option');
                        option.value = training.id;
                        option.textContent = training.name;
                        adminTrainingSelect.appendChild(option);

                        if (parseInt(training.id) === parseInt(existingAdminTrainingId)) {
                            option.selected = true;
                        }
                    });
                } catch (error) {
                    console.error('Error fetching trainings:', error);
                    alert('There was an error fetching the trainings.');
                }
            }
        }

        if (adminCourseSelect.value) {
            populateAdminTraining(adminCourseSelect.value);
        }

        adminCourseSelect.addEventListener('change', function () {
            const courseId = this.value;
            populateAdminTraining(courseId);
        });
    });
</script>