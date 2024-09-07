@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-1">
        <span class="fs-3">List special courses</span>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSpecial">
            Create a special
        </button>
        @include('special.create')
    </div>
    <div class="card shadow border">
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
            <table class="table table-striped" id="special-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Remarks</th>
                        <th>Created by</th>
                        <th>Updated by</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listOfSpecialCourse as $special)
                    <tr>
                        <td>{{ $special->name }}</td>
                        <td>{{ $special->remarks }}</td>
                        <td>{{ $special->createdBy->first_name }}</td>
                        <td>{{ $special->updatedBy->first_name }}</td>
                        <td>
                            <div class="dropdown">
                                <a href="" class="btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route($userRole . '.special.edit', ['special' => $special->id]) }}" class="dropdown-item">Edit</a>
                                    </li>
                                    @if(Auth::user()->role === 'superadmin')
                                    <li>
                                        <form action="{{ route('superadmin.special.destroy', ['special' => $special->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this special?')">Delete</button>
                                        </form>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scripts')
    <script>
    $(document).ready(function() {
        $('#special-table').DataTable({
            "processing": true,
            "serverSide": false,
            "pageLength": 10,
            "order": [[0, "desc"]],
        });
    });
    </script>
@endpush
@endsection