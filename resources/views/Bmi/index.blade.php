@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-1">
        <span class="fs-3">List Bmi</span>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBmi">
            Create an Bmi
        </button>
        @include('Bmi.create')
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
            <table class="table table-striped" id="bmi-table">
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
                    @foreach($listOfBmi as $bmi)
                    <tr>
                        <td>{{ $bmi->name }}</td>
                        <td>{{ $bmi->remarks }}</td>
                        <td>{{ $bmi->createdBy->first_name }}</td>
                        <td>{{ $bmi->updatedBy->first_name }}</td>
                        <td>
                            <div class="dropdown">
                                <a href="" class="btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route($userRole . '.bmi.edit', $bmi->id) }}" class="dropdown-item">Edit</a>
                                    </li>
                                    <li>
                                        <a href="{{ route($userRole . '.bmi.show', $bmi->id) }}" class="dropdown-item">Details</a>
                                    </li>
                                    @if(Auth::user()->role === 'superadmin')
                                    <li>
                                        <form action="{{ route('superadmin.bmi.destroy', $bmi->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this Bmi?')">Delete</button>
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
        $('#bmi-table').DataTable({
            "processing": true,
            "serverSide": false,
            "pageLength": 10,
            "order": [[0, "desc"]],
        });
    });
    </script>
@endpush
@endsection