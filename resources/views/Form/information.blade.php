<form action="" method="post">
    <div class="row mt-3">
        <div class="col-lg-4 col-md-12">
            <label for="first_name" class="form-label">First name:</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ strtoupper(Auth::user()->first_name) }}" readonly>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="middle_name" class="form-label">Middle name:</label>
            <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ strtoupper(Auth::user()->middle_name) }}" readonly>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="last_name" class="form-label">Last name:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ strtoupper(Auth::user()->last_name) }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <label for="rank" class="form-label">Rank:</label>
            <select name="rank" id="rank" class="form-select">
                @foreach($listOfRank as $rank)
                    <option value="{{ $rank->id }}">{{ $rank->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="QLFR" class="form-label">QLFR:</label>
            <input type="text" name="QLFR" id="QLFR" class="form-control">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="badge_number" class="form-label">Badge number:</label>
            <input type="text" name="badge_number" id="badge_number" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <label for="gender" class="form-label">Gender:</label>
            <input type="text" name="gender" id="gender" class="form-control">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="birthdate" class="form-label">Birthdate:</label>
            <input type="date" name="birthdate" id="birthdate" class="form-control">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="age" class="form-label">Age:</label>
            <input type="number" name="age" id="age" class="form-control" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-12">
            <label for="office" class="form-label">Office:</label>
            <select name="office" id="office" class="form-select">
                @foreach($listOfOffice as $office)
                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="enter_service" class="form-label">Date of entered service:</label>
            <input type="date" name="enter_service" id="enter_service" class="form-control">
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="last_promotion" class="form-label">Date of last promotion:</label>
            <input type="date" name="last_promotion" id="last_promotion" class="form-control">
        </div>
    </div>
    <input type="submit" value="submit" class="btn btn-primary mt-3">
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