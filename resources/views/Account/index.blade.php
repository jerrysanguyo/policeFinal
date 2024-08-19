@extends('layouts.app')

@section('content')

<div class="container">
    <span class="fs-3">List accounts</span>
    <div class="card shadow border">
        <div class="card-body">
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
                                        <a href="{{ route('admin.accounts.edit', ['account' => $account->id]) }}" class="dropdown-item">Edit</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.accounts.show', ['account' => $account->id]) }}" class="dropdown-item">Details</a>
                                    </li>
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