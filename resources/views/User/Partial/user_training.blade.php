<div class="mt-4">
    <span class="fs-3">Training information:</span>
</div>
@if($hasUserTraining)
    @if(Auth::user()->role === 'user')
        @php 
            $actionRoute = route('user.user_training.update', ['user_training' => $userTraining->id]); 
        @endphp
    @else
        @php 
            $actionRoute = route('admin.user_training.update', ['user_training' => $userTraining->id]); 
        @endphp
    @endif
    @php $method = 'post'; @endphp
@else
    @if(Auth::user()->role === 'user')
        @php 
            $actionRoute = route('user.user_training.store');
        @endphp
    @else
        @php 
            $actionRoute = route('admin.user_training.store');
        @endphp
    @endif
    @php $method = 'post'; @endphp
@endif
<form action="{{ $actionRoute }}" method="POST">
    @csrf
    @if($hasUserTraining)
        <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="row mt-3">
        <div class="col-lg-12 col-md-12">
            <label for="mandatory_training" class="form-label">Highest mandatory training:</label>
            <input type="text" name="mandatory_training" id="mandatory_training" class="form-control" value="{{ $userTraining->mandatory_training ?? '' }}">
        </div>
        <div class="col-lg-6 col-md-12">
            <label for="date_graduation" class="form-label">Date of graduation from the latest mandatory schooling:</label>
            <input type="date" name="date_graduation" id="date_graduation" class="form-control" value="{{ $userTraining->date_graduation ?? ''  }}" require>
        </div>
        <div class="col-lg-6 col-md-12">
            <label for="order_of_merit" class="form-label">Order of merit in the last mandatory training (Ranking):</label>
            <input type="text" name="order_of_merit" id="order_of_merit" class="form-control" value="{{ $userTraining->order_of_merit ?? ''  }}" require>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-4 col-md-12">
            <label for="ftoc" class="form-label">FTOC (For PSOAC & PSSLC ONLY):</label>
            <select name="ftoc" id="ftoc" class="form-select">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="qe_result" class="form-label">QE Result:</label>
            <select name="qe_result" id="qe_result" class="form-select">
                <option value="Passed">Passed</option>
                <option value="Failed">Failed</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="date_qualifying_exam" class="form-label">Date of qualifying exam:</label>
            <input type="date" name="date_qualifying_exam" id="date_qualifying_exam" class="form-control" value="{{ $userTraining->date_qualifying_exam ?? ''  }}">
        </div>
    </div>
    <input type="submit" value="{{$hasUserTraining ? 'Update' : 'Submit'}}" class="btn btn-primary mt-3">
</form>