<span class="fs-4">PHYSICAL FITNESS TRAINING:</span>
<form action="#" method="post">
    @csrf
    <div class="row mt-3">
        <div class="col-lg-6 col-md-12">
            <label for="bmi_result" class="form-label">Bmi result:</label>
            <input type="number" name="bmi_result" id="bmi_result" class="form-control">
        </div>
        <div class="col-lg-6 col-md-12">
            <label for="bmi_category" class="form-label">Bmi Category:</label>
            <select name="bmi_category" id="bmi_category" class="form-select">
                @foreach($listOfBmi as $bmi)
                    <option value="{{ $bmi->id }}">{{ $bmi->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-12">
            <label for="waist" class="form-label">Waist (CM):</label>
            <input type="number" name="waist" id="waist" class="form-control">
        </div>
        <div class="col-lg-2 col-md-12">
            <label for="hip" class="form-label">Hip (CM):</label>
            <input type="number" name="hip" id="hip" class="form-control">
        </div>
        <div class="col-lg-2 col-md-12">
            <label for="wrist" class="form-label">Wrist (CM):</label>
            <input type="number" name="wrist" id="wrist" class="form-control">
        </div>
        <div class="col-lg-3 col-md-12">
            <label for="height" class="form-label">Height (CM):</label>
            <input type="number" name="height" id="height" class="form-control" value="{{ $userTraining->height ?? '' }}"  step="0.01">
        </div>
        <div class="col-lg-3 col-md-12">
            <label for="height_m" class="form-label">Height (Meter):</label>
            <input type="number" name="height_m" id="height_m" class="form-control" readonly value="{{ old('height_m') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <label for="picture" class="form-label">Picture in athletic (Left):</label>
            <input type="file" name="picture_left" id="picture_left" class="form-control">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="picture" class="form-label">Picture in athletic (Right):</label>
            <input type="file" name="picture_right" id="picture_right" class="form-control">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="picture" class="form-label">Picture in athletic (Front):</label>
            <input type="file" name="picture_front" id="picture_front" class="form-control">
        </div>
    </div>
    <div class="row mt-3">
        <span class="fs-4">PFT result:</span>
    </div>
    <div class="row mt-3">
        <div class="col-lg-4 col-md-12">
            <label for="year" class="form-label">Year:</label>
            <input type="number" name="year" id="year" class="form-control">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="date_pft" class="form-label">Date of pft:</label>
            <input type="date" name="date_pft" id="date_pft" class="form-control">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="remarks" class="form-label">Remarks:</label>
            <select name="remarks" id="remarks" class="form-select">
                <option value="passed">Passed</option>
                <option value="failed">Failed</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <label for="score" class="form-label">Score:</label>
            <input type="number" name="score" id="score" class="form-control">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="type" class="form-label">Type:</label>
            <select name="type" id="type" class="form-select">
                <option value="remedial">Remedial</option>
                <option value="not">Not</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="pft_picture" class="form-label">Pft result:</label>
            <input type="file" name="pft_picture" id="pft_picture" class="form-control">
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