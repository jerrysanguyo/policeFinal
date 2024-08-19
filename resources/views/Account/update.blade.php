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
                    <form action="{{ route('admin.accounts.update', ['account'=>$account->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <span class="fs-3">Account update</span>
                        <hr>
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <label for="first_name" class="form-label">First name:</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $account->first_name }}">
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <label for="middle_name" class="form-label">Middle name:</label>
                                <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{ $account->middle_name }}">
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <label for="last_name" class="form-label">Last name:</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $account->last_name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ $account->email }}">
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <label for="mobile_number" class="form-label">Mobile number:</label>
                                <input type="text" name="mobile_number" id="mobile_number" class="form-control" value="{{ $account->mobile_number }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                        </div>
                        <input type="submit" value="Update" class="btn btn-primary mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection