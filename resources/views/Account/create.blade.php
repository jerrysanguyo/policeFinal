<div class="modal fade" id="createAccount" tabindex="-1" aria-labelledby="createAccountLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- form -->
            <form method="POST" action="{{ route('superadmin.account.store') }}">
                @csrf
                <!-- modal header -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createAccountLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- modal body -->
                <div class="modal-body">
                    <!-- input form -->
                    <div class="row mb-3">
                        <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First name') }}</label>
                        <div class="col-md-6">
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                            name="first_name" value="{{ old('first_name') }}" placeholder="First name"
                            required autocomplete="first_name" autofocus>

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="middle_name" class="col-md-4 col-form-label text-md-end">{{ __('Middle name') }}</label>
                        <div class="col-md-6">
                            <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror"
                            name="middle_name" value="{{ old('middle_name') }}" placeholder="Middle name"
                            required autocomplete="middle_name" autofocus>

                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last name') }}</label>
                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                            name="last_name" value="{{ old('last_name') }}" placeholder="Last name"
                            required autocomplete="last_name" autofocus>

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" placeholder="Email address"
                            value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mobile_number" class="col-md-4 col-form-label text-md-end">{{ __('Mobile number') }}</label>
                        <div class="col-md-6">
                            <input id="mobile_number" type="mobile_number" class="form-control @error('mobile_number') is-invalid @enderror"
                            name="mobile_number" placeholder="Mobile number"
                            value="{{ old('mobile_number') }}" required autocomplete="mobile_number">

                            @error('mobile_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Password"
                            required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" placeholder="Confirm password"
                            required autocomplete="new-password">
                        </div>
                    </div>
                    <!-- end input form -->
                </div>
                <!-- end modal body -->
                <!-- modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                <!-- end modal footer -->
            </form>
            <!-- end form -->
        </div>
    </div>
</div>