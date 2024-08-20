@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between mb-1">
        <span class="fs-3">Account information</span>
        <a href="{{ route('superadmin.account.index') }}">
            <button class="btn btn-secondary mt-2">
                Back
            </button>
        </a>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow border">
                <div class="card-body">
                    <span class="fs-4">Personal information:</span>
                    <div class="mt-3 row">
                        <label for="name" class="col-sm-3 col-form-label">Full name:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="name" value="{{ $account->first_name }} {{ $account->middle_name }} {{ $account->last_name }} ">
                        </div>
                    </div>
                    <div class="row">
                        <label for="Email" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="Email" value="{{ $account->email }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="mobile_number" class="col-sm-3 col-form-label">Mobile number:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="mobile_number" value="{{ $account->mobile_number }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="bday" class="col-sm-3 col-form-label">Birthdate:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="bday" value="{{ $account->userInfo->birthdate ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="age" class="col-sm-3 col-form-label">Age:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="age" value="{{ $account->userInfo->age ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="Height" class="col-sm-3 col-form-label">Height:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="Height" value="{{ $account->userInfo->height ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="Weight" class="col-sm-3 col-form-label">Weight:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="Weight" value="{{ $account->userInfo->weight ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="Waist" class="col-sm-3 col-form-label">Waist:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="Waist" value="{{ $account->userInfo->waist ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="Hip" class="col-sm-3 col-form-label">Hip:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="Hip" value="{{ $account->userInfo->hip ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="Wrist" class="col-sm-3 col-form-label">Wrist:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="Wrist" value="{{ $account->userInfo->wrist ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="BMI result" class="col-sm-3 col-form-label">BMI result:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="BMI result" value="{{ $account->userInfo->bmi_result ?? 'N/A' }}">
                        </div>
                    </div>
                    <div class="row">
                        <label for="BMI category" class="col-sm-3 col-form-label">BMI category:</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="BMI category" value="{{ $account->userInfo->bmi_category ?? 'N/A' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow border">
                        <div class="card-body">
                            <span class="fs-4">Service information:</span>
                            <div class="row">
                                <label for="rank" class="col-form-label col-sm-6">Rank:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="rank" class="form-control-plaintext" value="{{ $account->userService->rank ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="QLRF" class="col-form-label col-sm-6">QLRF:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="QLRF" class="form-control-plaintext" value="{{ $account->userService->qlrf ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="badge_number" class="col-form-label col-sm-6">Badge number:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="badge_number" class="form-control-plaintext" value="{{ $account->userService->badge_number ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="entered_service" class="col-form-label col-sm-6">Entered service:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="entered_service" class="form-control-plaintext" value="{{ $account->userService->entered_service ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="last_promotion" class="col-form-label col-sm-6">Last promotion:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="last_promotion" class="form-control-plaintext" value="{{ $account->userService->last_promotion ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="unit" class="col-form-label col-sm-6">Unit:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="unit" class="form-control-plaintext" value="{{ $account->userService->unit ?? 'N/A' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card shadow border">
                        <div class="card-body">
                            <span class="fs-4">Traning Information:</span>
                            <div class="row">
                                <label for="mandatory_training" class="col-form-label col-sm-6">Mandatory training:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="mandatory_training" class="form-control-plaintext" value="{{ $account->userTraining->mandatory_training ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="date_graduation" class="col-form-label col-sm-6">Date graduated:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="date_graduation" class="form-control-plaintext" value="{{ $account->userTraining->date_graduation ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="order_of_merit" class="col-form-label col-sm-6">Order of merit:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="order_of_merit" class="form-control-plaintext" value="{{ $account->userTraining->order_of_merit ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="fotc" class="col-form-label col-sm-6">FOTC:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="fotc" class="form-control-plaintext" value="{{ $account->userTraining->fotc ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="qe_result" class="col-form-label col-sm-6">QE result:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="qe_result" class="form-control-plaintext" value="{{ $account->userTraining->qe_result ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="date_qualifying_exam" class="col-form-label col-sm-6">Date of qualifying exam:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="date_qualifying_exam" class="form-control-plaintext" value="{{ $account->userTraining->date_qualifying_exam ?? 'N/A' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card shadow border">
                        <div class="card-body">
                            <span class="fs-4">Special Training information:</span>
                            <div class="row">
                                <label for="course" class="col-form-label col-sm-6">Special course training:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="course" class="form-control-plaintext" value="{{ $account->userSpecial->special_course_training ?? 'N/A' }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="duration" class="col-form-label col-sm-6">Duration:</label>
                                <div class="col-sm-6">
                                    <input type="text" readonly id="duration" class="form-control-plaintext" value="{{ $account->userSpecial->duration ?? 'N/A' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection