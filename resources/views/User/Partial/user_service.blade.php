<div class="mt-4">
    <span class="fs-3">Service information:</span>
</div>
@if($hasUserService)
    @if(Auth::user()->role === 'user')
        @php 
            $actionRoute = route('user.user_service.update', ['user_service' => $userService->id]); 
        @endphp
    @else
        @php 
            $actionRoute = route('admin.user_service.update', ['user_service' => $userService->id]); 
        @endphp
    @endif
    @php 
        $method = 'post'; 
    @endphp
@else
    @if(Auth::user()->role === 'user')
        @php 
            $actionRoute = route('user.user_service.store'); 
        @endphp
    @else
        @php 
            $actionRoute = route('admin.user_service.store'); 
        @endphp
    @endif
    @php 
        $method = 'post'; 
    @endphp
@endif
<form action="{{ $actionRoute }}" method="POST">
    @csrf
    @if($hasUserService)
        <input type="hidden" name="_method" value="PUT">
    @endif

    <div class="row mt-3">
        <div class="col-lg-4 col-md-12">
            <label for="rank" class="form-label">Rank:</label>
            <select name="rank" id="rank" class="form-select">
                <option value="sample" {{ (isset($userService) && $userService->rank === 'sample') ? 'selected' : '' }}>sample</option>
                <option value="sample1" {{ (isset($userService) && $userService->rank === 'sample1') ? 'selected' : '' }}>Sample1</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="qlrf" class="form-label">Qlrf:</label>
            <input type="text" name="qlrf" id="qlrf" class="form-control" value="{{ $userService->qlrf ?? ''  }}" require>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="badge_number" class="form-label">Badge number:</label>
            <input type="text" name="badge_number" id="badge_number" class="form-control" value="{{ $userService->badge_number ?? ''  }}" require>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-4 col-md-12">
            <label for="entered_service" class="form-label">Date of entered service:</label>
            <input type="date" name="entered_service" id="entered_service" class="form-control" value="{{ $userService->entered_service ?? ''  }}" require>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="last_promotion" class="form-label">Date of Last promotion:</label>
            <input type="date" name="last_promotion" id="last_promotion" class="form-control" value="{{ $userService->last_promotion ?? ''  }}" require>
        </div>
        <div class="col-lg-4 col-md-12">
            <label for="unit" class="form-label">Unit:</label>
            <select name="unit" id="unit" class="form-select">
                <option value="sample" {{ (isset($userService) && $userService->unit === 'sample') ? 'selected' : '' }}>sample</option>
                <option value="sample1" {{ (isset($userService) && $userService->unit === 'sample1') ? 'selected' : '' }}>Sample1</option>
            </select>
        </div>
    </div>
    <input type="submit" value="{{$hasUserService ? 'Update' : 'Submit'}}" class="btn btn-primary mt-3">
</form>