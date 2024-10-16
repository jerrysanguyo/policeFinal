<span class="fs-4">PHYSICAL FITNESS TRAINING:</span>
@if(!$userPhysical || !$userPft || !$userPicture)
<form action="{{ route($baseRoute . '.physical.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row mt-3">
        <div class="col-lg-6 col-md-12">
            <label for="bmi_result" class="form-label">Bmi result:</label>
            <input type="number" name="bmi_result" id="bmi_result" class="form-control"  step="0.01">
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
            <label for="picture_left" class="form-label">Picture in athletic (Left):</label>
            <input type="file" name="picture_left" id="picture_left" class="form-control" accept="image/*">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="picture_right" class="form-label">Picture in athletic (Right):</label>
            <input type="file" name="picture_right" id="picture_right" class="form-control" accept="image/*">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="picture_front" class="form-label">Picture in athletic (Front):</label>
            <input type="file" name="picture_front" id="picture_front" class="form-control" accept="image/*">
        </div>
    </div>
    <div class="row mt-3">
        <span class="fs-4">PFT result:</span>
    </div>
    <div id="pft-results-container">
        <div class="pft-result-set">
            <div class="row mt-3">
                <div class="col-lg-4 col-md-12">
                    <label for="year" class="form-label">Year:</label>
                    <input type="number" name="year[]" class="form-control">
                </div>
                <div class="col-lg-4 col-md-12">
                    <label for="date_pft" class="form-label">Date of pft:</label>
                    <input type="date" name="date_pft[]" class="form-control">
                </div>
                <div class="col-lg-4 col-md-12">
                    <label for="remarks" class="form-label">Remarks:</label>
                    <select name="remarks[]" class="form-select">
                        <option value="passed">Passed</option>
                        <option value="failed">Failed</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <label for="score" class="form-label">Score:</label>
                    <input type="number" name="score[]" class="form-control">
                </div>
                <div class="col-lg-4 col-md-12">
                    <label for="type" class="form-label">Type:</label>
                    <select name="type[]" class="form-select">
                        <option value="remedial">Remedial</option>
                        <option value="not">Not</option>
                    </select>
                </div>
                <div class="col-lg-4 col-md-12">
                    <label for="pft_picture" class="form-label">Pft result:</label>
                    <input type="file" name="pft_picture[]" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <!-- Button to Add PFT Result -->
    <div class="row mt-3">
        <div class="col-lg-12 col-md-12">
            <div class="d-flex justify-content-between">
                <input type="submit" value="Submit" class="btn btn-primary">
                <button type="button" id="add-pft-result" class="btn btn-secondary">Add PFT Result</button>
            </div>
        </div>
    </div>
</form>
@else
    <form action="{{ route($baseRoute . '.physical.update', $userPhysical->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row mt-3">
            <div class="col-lg-6 col-md-12">
                <label for="bmi_result" class="form-label">Bmi result:</label>
                <input type="number" name="bmi_result" id="bmi_result" class="form-control" value="{{ $userPhysical->bmi_result }}" step="0.01">
            </div>
            <div class="col-lg-6 col-md-12">
                <label for="bmi_category" class="form-label">Bmi Category:</label>
                <select name="bmi_category" id="bmi_category" class="form-select">
                    @foreach($listOfBmi as $bmi)
                        <option value="{{ $bmi->id }}" {{ $userPhysical && $userPhysical->bmi_category === $bmi->id ? 'selected' : '' }}>{{ $bmi->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-md-12">
                <label for="waist" class="form-label">Waist (CM):</label>
                <input type="number" name="waist" id="waist" class="form-control" value="{{ $userPhysical->waist }}">
            </div>
            <div class="col-lg-2 col-md-12">
                <label for="hip" class="form-label">Hip (CM):</label>
                <input type="number" name="hip" id="hip" class="form-control" value="{{ $userPhysical->hip }}">
            </div>
            <div class="col-lg-2 col-md-12">
                <label for="wrist" class="form-label">Wrist (CM):</label>
                <input type="number" name="wrist" id="wrist" class="form-control" value="{{ $userPhysical->wrist }}">
            </div>
            <div class="col-lg-3 col-md-12">
                <label for="height" class="form-label">Height (CM):</label>
                <input type="number" name="height" id="height" class="form-control" value="{{ $userPhysical->height ?? '' }}"  step="0.01">
            </div>
            <div class="col-lg-3 col-md-12">
                <label for="height_m" class="form-label">Height (Meter):</label>
                <input type="number" name="height_m" id="height_m" class="form-control" readonly value="{{ old('height_m') }}">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-12 col-md-12">
                <input type="submit" value="Update" class="btn btn-primary">
            </div>
        </div>
    </form>
    @if($userPicture)
        <div class="d-flex mt-3">
            @foreach($userPicture as $picture)
                <form action="{{ route($baseRoute . '.physical.updatePic', ['physicalPic' => $picture->id]) }}" 
                        method="post" class="me-3" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <img src="{{ asset($picture->picture_path) }}" alt="{{ $picture->remarks }}" class="img-thumbnail mb-2">
                        <label for="picture" class="form-label">Picture in {{ $picture->remarks }}:</label>
                        <input type="file" name="picture" id="picture" class="form-control" accept="image/*">
                    </div>
                    <input type="submit" value="Replace" class="btn btn-primary mt-2">
                </form>
            @endforeach
        </div>
    @endif
    @if($userPft)
        @foreach($userPft as $pft)
            <form action="{{ route($baseRoute . '.physical.updatePft', ['physicalPft' => $pft->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mt-3">
                    <div class="col-lg-3 col-md-12">
                        <img src="{{ asset($pft->pft_result_path) }}" alt="{{ $picture->pft_result_name }}" class="img-thumbnail mb-2">
                        <label for="pft_picture" class="form-label">Pft result:</label>
                        <input type="file" name="pft_picture" class="form-control">
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="row mt-3">
                            <div class="col-lg-4 col-md-12">
                                <label for="year" class="form-label">Year:</label>
                                <input type="number" name="year" class="form-control" value="{{ $pft->year }}">
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <label for="month" class="form-label">Month:</label>
                                <input type="text" name="month" class="form-control" value="{{ $pft->month }}" readonly>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <label for="date_pft" class="form-label">Date of pft:</label>
                                <input type="date" name="date_pft" class="form-control" value="{{ $pft->date_pft }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <label for="remarks" class="form-label">Remarks:</label>
                                <select name="remarks" class="form-select">
                                    <option value="passed" {{ $pft && $pft->remarks === 'passed' ? 'selected' : '' }}>Passed</option>
                                    <option value="failed" {{ $pft && $pft->remarks === 'failed' ? 'selected' : '' }}>Failed</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <label for="score" class="form-label">Score:</label>
                                <input type="number" name="score" class="form-control" value="{{ $pft->score }}">
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <label for="type" class="form-label">Type:</label>
                                <select name="type" class="form-select">
                                    <option value="remedial" {{ $pft && $pft->type === 'remedial' ? 'selected' : '' }}>Remedial</option>
                                    <option value="not" {{ $pft && $pft->type === 'not' ? 'selected' : '' }}>Not</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12 col-md-12">
                                <input type="submit" value="Save" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    @endif
@endif
<script>
document.addEventListener('DOMContentLoaded', function() {
    function setupHeightCalculation(heightInput, heightMInput) {
        function updateHeightM() {
            const heightInCm = parseFloat(heightInput.value);

            // Check if heightInCm is a valid number and greater than 0
            if (!isNaN(heightInCm) && heightInCm > 0) {
                heightMInput.value = (heightInCm / 100).toFixed(2);
            } else {
                // Clear the height_m field if heightInCm is invalid or cleared
                heightMInput.value = '';
            }
        }

        // Initial call to set height_m if height is already set
        updateHeightM();

        // Update height_m whenever the height value changes
        heightInput.addEventListener('input', updateHeightM);
    }

    // Select the height and height_m elements
    const heightInput = document.getElementById('height');
    const heightMInput = document.getElementById('height_m');

    // Set up the height calculation if elements are found
    if (heightInput && heightMInput) {
        setupHeightCalculation(heightInput, heightMInput);
    }

    // PFT Result Add Button
    const addPftResultButton = document.getElementById('add-pft-result');
    if (addPftResultButton) {
        addPftResultButton.addEventListener('click', function () {
            const pftResultsContainer = document.getElementById('pft-results-container');
            const newPftResultSet = document.querySelector('.pft-result-set').cloneNode(true);

            // Reset fields in the cloned set
            newPftResultSet.querySelectorAll('input, select').forEach(field => field.value = '');

            // Create a Remove button for the new set
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.classList.add('btn', 'btn-danger', 'mt-2');
            removeButton.textContent = 'Remove PFT Result';
            removeButton.addEventListener('click', function () {
                newPftResultSet.remove();
            });

            // Append Remove button to the new PFT result set
            newPftResultSet.appendChild(removeButton);
            
            // Add new set to the container
            pftResultsContainer.appendChild(newPftResultSet);
        });
    }
});
</script>