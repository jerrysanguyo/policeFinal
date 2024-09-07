@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-1">
        <span class="fs-3">List accounts</span>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createAccount">
            Create an account
        </button>
        @include('account.create')
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
            <table class="table table-striped" id="account-table">
                <thead>
                    <tr>
                        <th>Full name</th>
                        <th>Email</th>
                        <th>Contact number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listOfAccount as $account)
                    <tr>
                        <td>{{ $account->first_name }} {{ $account->middle_name }} {{ $account->last_name }}</td>
                        <td>{{ $account->email }}</td>
                        <td>{{ $account->mobile_number }}</td>
                        <td>
                            <div class="dropdown">
                                <a href="" class="btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route($userRole . '.account.edit', ['account' => $account->id]) }}" class="dropdown-item">Edit</a>
                                    </li>
                                    <li>
                                        <a href="{{ route($userRole . '.account.show', ['account' => $account->id]) }}" class="dropdown-item">Details</a>
                                    </li>
                                    @if(Auth::user()->role === 'superadmin')
                                    <li>
                                        <form action="{{ route('superadmin.account.destroy', ['account' => $account->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Are you sure you want to delete this account?')">Delete</button>
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
        $('#account-table').DataTable({
            "processing": true,
            "serverSide": false,
            "pageLength": 10,
            "order": [[0, "desc"]],
        });
    });
    </script>
@endpush
@endsection