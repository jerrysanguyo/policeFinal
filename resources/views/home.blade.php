@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border shadow">
                <div class="card-body">
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
                    @php
                        $baseRoute = Auth::user()->role;
                    @endphp
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('activeTab', 'information') == 'information' ? 'active' : '' }}"
                                id="information-tab" data-bs-toggle="tab" data-bs-target="#information-tab-pane" 
                                type="button" role="tab" aria-controls="information-tab-pane" 
                                aria-selected="{{ session('activeTab', 'information') == 'information' ? 'true' : 'false' }}">
                                    I. General information
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('activeTab') == 'course' ? 'active' : '' }}"
                                id="course-tab" data-bs-toggle="tab" data-bs-target="#course-tab-pane"
                                type="button" role="tab" aria-controls="course-tab-pane" 
                                aria-selected="{{ session('activeTab') == 'course' ? 'true' : 'false' }}">
                                    II. Mandatory Course training
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('activeTab') == 'training' ? 'active' : '' }}"
                                id="training-tab" data-bs-toggle="tab" data-bs-target="#training-tab-pane"
                                type="button" role="tab" aria-controls="training-tab-pane"
                                aria-selected="{{ session('activeTab') == 'training' ? 'true' : 'false' }}">
                                    III. Specialized Course training
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link {{ session('activeTab') == 'physical' ? 'active' : '' }}"
                                id="physical-tab" data-bs-toggle="tab" data-bs-target="#physical-tab-pane"
                                type="button" role="tab" aria-controls="physical-tab-pane"
                                aria-selected="{{ session('activeTab') == 'physical' ? 'true' : 'false' }}">
                                    IV. Physical Fitness training
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade {{ session('activeTab', 'information') == 'information' ? 'show active' : '' }}" id="information-tab-pane" role="tabpanel" aria-labelledby="information-tab" tabindex="0">
                            @include('Form.information')
                        </div>
                        <div class="tab-pane fade {{ session('activeTab') == 'course' ? 'show active' : '' }}" id="course-tab-pane" role="tabpanel" aria-labelledby="course-tab" tabindex="0">
                            @include('Form.course')  
                        </div>
                        <div class="tab-pane fade {{ session('activeTab') == 'training' ? 'show active' : '' }}" id="training-tab-pane" role="tabpanel" aria-labelledby="training-tab" tabindex="0">
                            @include('Form.training')
                        </div>
                        <div class="tab-pane fade {{ session('activeTab') == 'physical' ? 'show active' : '' }}" id="physical-tab-pane" role="tabpanel" aria-labelledby="physical-tab" tabindex="0">
                            @include('Form.physical')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
