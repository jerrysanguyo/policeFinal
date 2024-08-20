<form action="{{ route( $baseRoute . '.information.storeOrUpdate') }}" method="post">
    @csrf
    <div class="row mt-3">
        <div class="col-lg-4 col-md-12">
            <label for="first_name" class="form-label">First name:</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ strtoupper($user->first_name) }}" readonly>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="middle_name" class="form-label">Middle name:</label>
            <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ strtoupper($user->middle_name) }}" readonly>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="last_name" class="form-label">Last name:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ strtoupper($user->last_name) }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <label for="rank_id" class="form-label">Rank:</label>
            <select name="rank_id" id="rank_id" class="form-select">
                @foreach($listOfRank as $rank)
                    <option value="{{ $rank->id }}" {{ $userInformation && $userInformation->rank_id == $rank->id ? 'selected' : '' }}>
                        {{ $rank->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="qlfr" class="form-label">QLFR:</label>
            <input type="text" name="qlfr" id="qlfr" class="form-control" value="{{ old('qlfr', $userInformation->qlfr ?? '') }}">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="badge_number" class="form-label">Badge number:</label>
            <input type="text" name="badge_number" id="badge_number" class="form-control" value="{{ old('badge_number', $userInformation->badge_number ?? '') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <label for="gender" class="form-label">Gender:</label>
            <input type="text" name="gender" id="gender" class="form-control" value="{{ old('gender', $userInformation->gender ?? '') }}">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="birthdate" class="form-label">Birthdate:</label>
            <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ old('birthdate', $userInformation->birthdate ?? '') }}">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="age" class="form-label">Age:</label>
            <input type="number" name="age" id="age" class="form-control" readonly value="{{ old('age', $userInformation->age ?? '') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <label for="office_id" class="form-label">Office:</label>
            <select name="office_id" id="office_id" class="form-select">
                @foreach($listOfOffice as $office)
                    <option value="{{ $office->id }}" {{ $userInformation && $userInformation->office_id == $office->id ? 'selected' : '' }}>
                        {{ $office->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="entered_service" class="form-label">Date of entered service:</label>
            <input type="date" name="entered_service" id="entered_service" class="form-control" value="{{ old('entered_service', $userInformation->entered_service ?? '') }}">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="last_promotion" class="form-label">Date of last promotion:</label>
            <input type="date" name="last_promotion" id="last_promotion" class="form-control" value="{{ old('last_promotion', $userInformation->last_promotion ?? '') }}">
        </div>
    </div>
    <input type="submit" value="Submit" class="btn btn-primary mt-3">
</form>

<script>
    document.getElementById('birthdate').addEventListener('change', function() {
        const birthdate = new Date(this.value);
        const today = new Date();
        let age = today.getFullYear() - birthdate.getFullYear();
        const monthDifference = today.getMonth() - birthdate.getMonth();

        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthdate.getDate())) {
            age--;
        }

        document.getElementById('age').value = age;
    });
</script>
