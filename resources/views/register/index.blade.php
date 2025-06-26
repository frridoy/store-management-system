@extends('admin.layouts.app') {{-- or your layout --}}

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">User List with Branch Info</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>User Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Branch Name</th>
                <th>Branch Code</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->official_phone_no }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ optional($user->branch)->name ?? 'No branch' }}</td>
                    <td>{{ optional($user->branch)->code ?? 'No code' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No users found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
