<div class="mt-4">
    <span class="fs-3">Personal information:</span>
</div>
<div class="row mt-3">
    <div class="col-lg-4 col-md-4">
        <label for="fn" class="form-label">First name:</label>
        <input type="text" name="first_name" id="fn" class="form-control" value="{{ Auth::user()->first_name }}" readonly>
    </div>
    <div class="col-lg-4 col-md-4">
        <label for="mn" class="form-label">Middle name:</label>
        <input type="text" name="middle_name" id="mn" class="form-control" value="{{ Auth::user()->middle_name }}" readonly>
    </div>
    <div class="col-lg-4 col-md-4">
        <label for="ln" class="form-label">Last name:</label>
        <input type="text" name="last_name" id="ln" class="form-control" value="{{ Auth::user()->last_name }}" readonly>
    </div>
</div>
@if($hasUserInfo)  
    @if(Auth::user()->role === 'user')
        @php 
            $actionRoute = route('user.user_info.update', ['user_info' => $userInfo->id]); 
        @endphp
    @else
        @php 
            $actionRoute = route('admin.user_info.update', ['user_info' => $userInfo->id]); 
        @endphp
    @endif
    @php $method = 'post'; @endphp
@else
    @if(Auth::user()->role === 'user')
        @php 
            $actionRoute = route('user.user_info.store'); 
        @endphp
    @else
        @php
            $actionRoute = route('admin.user_info.store');
        @endphp
    @endif
    @php 
        $method = 'post'; 
    @endphp
@endif
<form action="{{ $actionRoute }}" method="POST">
    @csrf
    @if($hasUserInfo)
        <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="row mt-3">
        <div class="col-lg-4 col-md-6">
            <label for="birthdate" class="form-label">Birthdate:</label>
            <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ $userInfo->birthdate ?? '' }}" required>
        </div>
        <div class="col-lg-4 col-md-6">
            <label for="age" class="form-label">Age:</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $userInfo->age ?? '' }}" required>
        </div>
        <div class="col-lg-4 col-md-6">
            <label for="height" class="form-label">Height:</label>
            <input type="number" name="height" id="height" class="form-control" value="{{ $userInfo->height ?? '' }}" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-4 col-md-6">
            <label for="weight" class="form-label">Weight:</label>
            <input type="number" name="weight" id="weight" class="form-control" value="{{ $userInfo->weight ?? '' }}" required>
        </div>
        <div class="col-lg-4 col-md-6">
            <label for="hip" class="form-label">Hip:</label>
            <input type="number" name="hip" id="hip" class="form-control" value="{{ $userInfo->hip ?? '' }}" required>
        </div>
        <div class="col-lg-4 col-md-6">
            <label for="waist" class="form-label">Waist:</label>
            <input type="number" name="waist" id="waist" class="form-control" value="{{ $userInfo->waist ?? '' }}" required>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-4 col-md-6">
            <label for="wrist" class="form-label">Wrist:</label>
            <input type="number" name="wrist" id="wrist" class="form-control" value="{{ $userInfo->wrist ?? '' }}" required>
        </div>
        <div class="col-lg-4 col-md-6">
            <label for="bmi_result" class="form-label">BMI result:</label>
            <input type="number" name="bmi_result" id="bmi_result" class="form-control" value="{{ $userInfo->bmi_result ?? '' }}" required>
        </div>
        <div class="col-lg-4 col-md-6">
            <label for="bmi_category" class="form-label">BMI category:</label>
            <select name="bmi_category" id="bmi_category" class="form-select" required>
                <option value="under_weight" {{ (isset($userInfo) && $userInfo->bmi_category === 'under_weight') ? 'selected' : '' }}>Under weight</option>
                <option value="normal_weight" {{ (isset($userInfo) && $userInfo->bmi_category === 'normal_weight') ? 'selected' : '' }}>Normal weight</option>
                <option value="over_weight" {{ (isset($userInfo) && $userInfo->bmi_category === 'over_weight') ? 'selected' : '' }}>Over weight</option>
                <option value="Obese_1" {{ (isset($userInfo) && $userInfo->bmi_category === 'Obese_1') ? 'selected' : '' }}>Obese 1</option>
                <option value="Obese_2" {{ (isset($userInfo) && $userInfo->bmi_category === 'Obese_2') ? 'selected' : '' }}>Obese 2</option>
            </select>
        </div>
    </div>
    <input type="submit" value="{{$hasUserInfo ? 'Update' : 'Submit'}}" class="btn btn-primary mt-3">
</form>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const birthdateInput = document.getElementById('birthdate');
    const ageInput = document.getElementById('age');

    birthdateInput.addEventListener('change', function() {
        const birthdate = new Date(this.value);
        const age = calculateAge(birthdate);
        ageInput.value = age;
    });

    function calculateAge(birthdate) {
        const today = new Date();
        let age = today.getFullYear() - birthdate.getFullYear();
        const m = today.getMonth() - birthdate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthdate.getDate())) {
            age--;
        }
        return age;
    }
});
</script>