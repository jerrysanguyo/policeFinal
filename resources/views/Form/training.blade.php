<span class="fs-4">SPECIALIZED COURSE TRAINING:</span>
<form action="#" method="post">
    @csrf
    <div class="row mt-3">
        <div class="col-lg-6 col-md-12">
            <label for="admin_course" class="form-label">Admin training course:</label>
            <select name="admin_course" id="admin_course" class="form-select">
                <option value="">Choose ..</option>
                @foreach($listOfSpecialCourse as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
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
        <div class="col-lg-3 col-md-12">
            <label for="class_number" class="form-label">Class number:</label>
            <input type="text" name="class_number" id="class_number" class="form-control">
        </div>
        <div class="col-lg-3 col-md-12">
            <label for="duration" class="form-label">Duration of training</label>
            <input type="number" name="duration" id="duration" class="form-control">
        </div>
        <div class="col-lg-3 col-md-12">
            <label for="height" class="form-label">Height (CM):</label>
            <input type="number" name="height" id="height" class="form-control">
        </div>
        <div class="col-lg-3 col-md-12">
            <label for="height_m" class="form-label">Height (Meter):</label>
            <input type="number" name="height_m" id="height_m" class="form-control">
        </div>
    </div>
    <input type="submit" value="Submit" class="btn btn-primary mt-3">
</form>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const adminCourseSelect = document.getElementById('admin_course');
        const adminTrainingSelect = document.getElementById('admin_training');

        adminCourseSelect.addEventListener('change', async function () {
            const courseId = this.value;
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
                    });
                } catch (error) {
                    console.error('Error fetching trainings:', error);
                    alert('There was an error fetching the trainings.');
                }
            }
        });
    });
</script>