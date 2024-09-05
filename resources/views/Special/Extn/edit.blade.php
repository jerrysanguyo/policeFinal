@extends('layouts.app')

@section('content')

<div class="container">
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
    <div class="d-flex justify-content-center mt-5">
        <div class="col-lg-6">
            <div class="card shadow border">
                <div class="card-body">
                    <form action="{{ route('superadmin.specialExtn.update', ['specialExtn'=>$specialExtn->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <span class="fs-3">Special course extension update</span>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <label for="special_id" class="form-label">Special course:</label>
                                <select name="special_id" id="special_id" class="form-select">
                                    @foreach($listOfSpecialCourse as $course)
                                        <option value="{{ $course->id }}" {{ $specialExtn && $specialExtn->special_id === $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <label for="name" class="form-label">Special Course extension name:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $specialExtn->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <label for="remarks" class="form-label">Remarks:</label>
                                <input type="text" name="remarks" id="remarks" class="form-control" value="{{ $specialExtn->remarks }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <input type="submit" value="Update" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                    <a href="{{ route('superadmin.specialExtn.index') }}">
                        <button class="btn btn-secondary mt-2">
                            Back
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection