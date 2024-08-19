@extends('layouts.app')

@section('content')
<div class="container container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card shadow border-0">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('activeTab', 'personal') == 'personal' ? 'active' : '' }}" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal-tab-pane" type="button" role="tab" aria-controls="personal-tab-pane" aria-selected="{{ session('activeTab', 'personal') == 'personal' ? 'true' : 'false' }}">I</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('activeTab') == 'service' ? 'active' : '' }}" id="service-tab" data-bs-toggle="tab" data-bs-target="#service-tab-pane" type="button" role="tab" aria-controls="service-tab-pane" aria-selected="{{ session('activeTab') == 'service' ? 'true' : 'false' }}">II</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('activeTab') == 'training' ? 'active' : '' }}" id="training-tab" data-bs-toggle="tab" data-bs-target="#training-tab-pane" type="button" role="tab" aria-controls="training-tab-pane" aria-selected="{{ session('activeTab') == 'training' ? 'true' : 'false' }}">III</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('activeTab') == 'special' ? 'active' : '' }}" id="special-tab" data-bs-toggle="tab" data-bs-target="#special-tab-pane" type="button" role="tab" aria-controls="special-tab-pane" aria-selected="{{ session('activeTab') == 'special' ? 'true' : 'false' }}">IV</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade {{ session('activeTab', 'personal') == 'personal' ? 'show active' : '' }}" id="personal-tab-pane" role="tabpanel" aria-labelledby="personal-tab" tabindex="0">
                            @include('User/Partial/user_info')
                        </div>
                        <div class="tab-pane fade {{ session('activeTab') == 'service' ? 'show active' : '' }}" id="service-tab-pane" role="tabpanel" aria-labelledby="service-tab" tabindex="0">
                            @include('User/Partial/user_service')
                        </div>
                        <div class="tab-pane fade {{ session('activeTab') == 'training' ? 'show active' : '' }}" id="training-tab-pane" role="tabpanel" aria-labelledby="training-tab" tabindex="0">
                            @include('User/Partial/user_training')
                        </div>
                        <div class="tab-pane fade {{ session('activeTab') == 'special' ? 'show active' : '' }}" id="special-tab-pane" role="tabpanel" aria-labelledby="special-tab" tabindex="0">
                            @include('User/Partial/user_special_training')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
