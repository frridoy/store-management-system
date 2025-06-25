@extends('admin.layouts.app')

@section('content')
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="w-100" style="max-width: 600px">
            <h2 class="text-center mb-4">Create New Branch</h2>

            <form action="{{ route('branches.store') }}" method="POST" class="border p-4 rounded shadow-sm bg-white">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Branch Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Branch Name">
                    @error('name')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="code" class="form-label">Branch Code</label>
                    <input type="text" name="code" class="form-control" placeholder="Enter Branch Code">
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" placeholder="Enter Location">
                </div>

                <div class="mb-3">
                    <label for="branch_manager" class="form-label">Branch Manager</label>
                    <input type="text" name="branch_manager" class="form-control"
                        placeholder="Enter Branch Manager Name">
                </div>

                <div class="mb-3">
                    <label for="phone_no" class="form-label">Phone Number</label>
                    <input type="text" name="phone_no" class="form-control" placeholder="Enter Phone Number">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Enter Email Address">
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Create Branch</button>
                </div>
            </form>
        </div>
    </div>
@endsection
