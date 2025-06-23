@extends('admin.layouts.app')
@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Categories List</h4>
                        <a href="{{ route('categories.create') }}" class="btn btn-light">
                            <i class="bi bi-plus-lg"></i> Add New
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Status</th>
                                    <th>Created By</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_code ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $category->status ? 'success' : 'danger' }}">
                                            {{ $category->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>{{ $category->creator->name ?? 'System' }}</td>
                                    <td>{{ $category->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
