@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between mb-1">
        <span class="fs-3">Account information</span>
        <a href="{{ route($userRole . '.account.index') }}">
            <button class="btn btn-secondary mt-2">
                Back
            </button>
        </a>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card border shadow" style="height: 500px">
                <div class="card-body">
                    <span class="fs-5">I. General information:</span>
                    <div class="mt-3 row">
                        <label for="name" class="col-sm-4 col-form-label">Full name:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="name" value="{{ $account->first_name }} {{ $account->middle_name }} {{ $account->last_name }} ">
                        </div>
                    </div>
                    <div class="row">
                        <label for="rank" class="col-sm-4 col-form-label">Rank:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="rank" value="{{ $account->information->rank->name ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="qlfr" class="col-sm-4 col-form-label">Qlfr:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="qlfr" value="{{ $account->information->qlfr ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="badge_number" class="col-sm-4 col-form-label">Badge number:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="badge_number" value="{{ $account->information->badge_number ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="gender" class="col-sm-4 col-form-label">Gender:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="gender" value="{{ $account->information->gender ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="birthdate" class="col-sm-4 col-form-label">Birthdate:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="birthdate" value="{{ $account->information->birthdate ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="age" class="col-sm-4 col-form-label">Age:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="age" value="{{ $account->information->age ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="office" class="col-sm-4 col-form-label">Office:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="office" value="{{ $account->information->office->name ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="shift" class="col-sm-4 col-form-label">Shift:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="shift" value="{{ $account->information->shift ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="entered_service" class="col-sm-4 col-form-label">Entered service:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="entered_service" value="{{ $account->information->entered_service ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="last_promotion" class="col-sm-4 col-form-label">last promotion:</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="last_promotion" value="{{ $account->information->last_promotion ?? 'N/A' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-12">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card border shadow overflow-auto" style="height:500px;">
                        <div class="card-body">
                            <span class="fs-5">II. Mandatory course:</span>
                            <div class="mt-3 row">
                                <label for="high_training" class="col-sm-4 col-form-label">Highest mandatory training:</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="high_training" value="{{ $account->course_extn->highestTraining->name ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="date_graduation" class="col-sm-4 col-form-label">Date graduated:</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="date_graduation" value="{{ $account->course_extn->date_graduation ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="order_merit" class="col-sm-4 col-form-label">Order of merit:</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="order_merit" value="{{ $account->course_extn->order_merit ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="ftoc" class="col-sm-4 col-form-label">FTOC:</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="ftoc" value="{{ $account->course_extn->ftoc ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="qe_result" class="col-sm-4 col-form-label">QE result:</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="qe_result" value="{{ $account->course_extn->qe_result ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="date_qualifying" class="col-sm-4 col-form-label">Date of QE:</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control-plaintext" id="date_qualifying" value="{{ $account->course_extn->date_qualifying ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <span class="fs-6">Program/s:</span>
                                @foreach($listOfCourse as $course)
                                    <div class="accordion accordion-flush" id="accordionFlushCourse">
                                        <div class="accordion-item border">
                                            <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$course->program_id}}" aria-expanded="false" aria-controls="flush-collapse{{$course->program_id}}">
                                                {{ $course->program->name }}
                                            </button>
                                            </h2>
                                            <div id="flush-collapse{{$course->program_id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushCourse">
                                                <div class="accordion-body">
                                                    <div class="row">
                                                        <label for="class_number" class="col-sm-4 col-form-label">Class number:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" readonly class="form-control-plaintext" id="class_number" value="{{ $course->class_number ?? 'N/A' }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label for="start_date" class="col-sm-4 col-form-label">Start date:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" readonly class="form-control-plaintext" id="start_date" value="{{ $course->start_date ?? 'N/A' }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label for="end_date" class="col-sm-4 col-form-label">End date:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" readonly class="form-control-plaintext" id="end_date" value="{{ $course->end_date ?? 'N/A' }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label for="ranking" class="col-sm-4 col-form-label">Ranking:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" readonly class="form-control-plaintext" id="ranking" value="{{ $course->ranking ?? 'N/A' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="card border shadow overflow-auto" style="height:500px">
                        <div class="card-body">
                            <span class="fs-5">III. Training course:</span>
                            <div class="row">
                            @foreach($listOfSpecial as $special)
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item border">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" 
                                                    data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $special->id }}{{ $special->id }}" 
                                                    aria-expanded="false" aria-controls="flush-collapse{{ $special->id }}{{ $special->id }}">
                                                {{ $special->name ?? 'Course Name Not Available' }}
                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{ $special->id }}{{ $special->id }}" class="accordion-collapse collapse" 
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                @php
                                                    $correspondingCourses = \App\Models\SpecialTraining::perCourse($special->id, $account->id);
                                                @endphp
                                                
                                                @foreach($correspondingCourses as $course)
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Traning:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" readonly class="form-control-plaintext" value="{{ $course->training->name ?? 'N/A' }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Class number:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" readonly class="form-control-plaintext" value="{{ $course->class_number ?? 'N/A' }}">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-sm-4 col-form-label">Date:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" readonly class="form-control-plaintext" value="{{ $course->start_date ?? 'N/A' }} - {{ $course->end_date ?? 'N/A' }}">
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card border shadow" style="height:500px;">
                <div class="card-body">
                    <span class="fs-5">IV. Physical fitness training:</span>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="mt-3 row">
                                <label for="bmi_result" class="col-sm-5 col-form-label">Bmi result:</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="bmi_result" value="{{ $account->physical->bmi_result }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="bmi_category" class="col-sm-5 col-form-label">Bmi category:</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="bmi_category" value="{{ $account->physical->bmi->name }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="waist" class="col-sm-5 col-form-label">Waist:</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="waist" value="{{ $account->physical->waist }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="hip" class="col-sm-5 col-form-label">Hip:</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="hip" value="{{ $account->physical->hip }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="wrist" class="col-sm-5 col-form-label">Wrist:</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="wrist" value="{{ $account->physical->wrist }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="height" class="col-sm-5 col-form-label">Height:</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext" id="height" value="{{ $account->physical->height }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-6 col-sm-12">
                            <div class="row">
                                @foreach($listOfPic as $pic)
                                <div class="col-lg-4">
                                    <div class="card" style="width: 13rem;">
                                        <a href="{{ asset($pic->picture_path) }}" target="_blank">
                                            <img src="{{ asset($pic->picture_path) }}" alt="{{ $pic->picture_name }}" class="card-img-top">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title text-center">{{ $pic->remarks }}</h5>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <span class="fs-5">Pft record/s:</span>
                            <table class="table table-striped-columns border">
                                <thead>
                                    <tr>
                                        <th>Year</th>
                                        <th>Month</th>
                                        <th>Date of pft</th>
                                        <th>Remarks</th>
                                        <th>Score</th>
                                        <th>Type</th>
                                        <th>Pft result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($listOfPft as $pft)
                                    <tr>
                                        <td>{{ $pft->year }}</td>
                                        <td>{{ $pft->month }}</td>
                                        <td>{{ $pft->date_pft }}</td>
                                        <td>{{ $pft->remarks }}</td>
                                        <td>{{ $pft->score }}</td>
                                        <td>{{ $pft->type }}</td>
                                        <td>
                                            <a href="{{ asset($pft->pft_result_path) }}" target="_blank">
                                                <button class="btn btn-primary">View</button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection