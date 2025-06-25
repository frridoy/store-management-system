@extends('admin.layouts.app')

@section('content')
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="w-100" style="max-width: 1000px;">
            <h2 class="text-center mb-4">Create New User</h2>

            <form action="{{ route('register.store') }}" method="POST" class="border p-4 rounded shadow-sm bg-white">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" >
                    </div>
                    <div class="col-md-4">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" >
                    </div>
                    <div class="col-md-4">
                        <label>User Type</label>
                        <select name="user_type" class="form-control" >
                            <option value="3">Sales Person</option>
                            <option value="2">Manager</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Branch Name</label>
                        <select name="branch_id" class="form-control" id="">
                            @if (!empty($branches))
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}">{{ $branch->code }} - {{ $branch->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Status</label>
                        <select name="status" class="form-control" >
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Personal Phone</label>
                        <input type="text" name="personal_phone_no" class="form-control" >
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Official Phone</label>
                        <input type="text" name="official_phone_no" class="form-control" >
                    </div>
                    <div class="col-md-4">
                        <label>Joining Date</label>
                        <input type="date" name="joining_date" class="form-control" >
                    </div>
                    <div class="col-md-4">
                        <label>Resigned Date</label>
                        <input type="date" name="regined_date" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" class="form-control" >
                    </div>
                    <div class="col-md-4">
                        <label>Sex</label>
                        <select name="sex" class="form-control" >
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                            <option value="3">Other</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Age</label>
                        <input type="number" name="age" class="form-control" >
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Marital Status</label>
                        <select name="marital_status" class="form-control" >
                            <option value="1">Married</option>
                            <option value="2">Unmarried</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Present Division</label>
                        <input type="text" name="present_division" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label>Present District</label>
                        <input type="text" name="present_district" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Present Thana</label>
                        <input type="text" name="present_thana" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label>Permanent Division</label>
                        <input type="text" name="permanent_division" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label>Permanent District</label>
                        <input type="text" name="permanent_district" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Permanent Thana</label>
                        <input type="text" name="permanent_thana" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" >
                        @error('password')
                             <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                     <div class="col-md-4">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" >
                          @error('confirm_password')
                             <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary">Create User</button>
                </div>
            </form>
        </div>
    </div>
@endsection
