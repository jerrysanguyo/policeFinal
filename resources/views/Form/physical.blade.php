<span class="fs-4">PHYSICAL FITNESS TRAINING:</span>
<form action="{{ route($baseRoute . '.training.storeOrUpdate') }}" method="post">
    @csrf
    <div class="row mt-3">

    </div>
    <div class="row mt-3">
        <div class="col-lg-4 col-md-12">
            <label for="height" class="form-label">Height (CM):</label>
            <input type="number" name="height" id="height" class="form-control" value="{{ $userTraining->height ?? '' }}"  step="0.01">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="height_m" class="form-label">Height (Meter):</label>
            <input type="number" name="height_m" id="height_m" class="form-control" readonly value="{{ old('height_m') }}">
        </div>
    </div>
    <input type="submit" value="Submit" class="btn btn-primary mt-3">
</form>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const heightInput = document.getElementById('height');
        const heightMInput = document.getElementById('height_m');

        function updateHeightM() {
            const heightInCm = heightInput.value;

            if (heightInCm) {
                heightMInput.value = (heightInCm / 100).toFixed(2);
            } else {
                heightMInput.value = ''; 
            }
        }

        if (heightInput.value) {
            updateHeightM();
        }

        heightInput.addEventListener('input', updateHeightM);
    });
    
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