<div class="modal fade" id="createSpecialExtn" tabindex="-1" aria-labelledby="createSpecialExtnLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- form -->
            <form method="POST" action="{{ route('superadmin.specialExtn.store') }}">
                @csrf
                <!-- modal header -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="createSpecialExtnLabel">SpecialExtn creation</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- modal body -->
                <div class="modal-body">
                    <!-- input form -->
                    <div class="row mb-3">
                        <label for="special_id" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
                        <div class="col-md-6">
                            <select name="special_id" id="special_id" class="form-select @error('special_id') is-invalid @enderror">
                                @foreach($listOfSpecialCourse as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" placeholder="SpecialExtn name"
                            required autocomplete="name" autofocus>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="remarks" class="col-md-4 col-form-label text-md-end">{{ __('Remarks') }}</label>
                        <div class="col-md-6">
                            <input id="remarks" type="text" class="form-control @error('remarks') is-invalid @enderror"
                            name="remarks" value="{{ old('remarks') }}" placeholder="Remarks"
                            required autocomplete="remarks" autofocus>
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