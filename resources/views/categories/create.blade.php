@extends('admin.layouts.app')
@section('content')

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                <!-- Card Header - Fixed Alignment -->
                <div class="card-header bg-gradient-primary text-white py-3 rounded-top-4">
                    <div class="d-flex align-items-center">
                        <div class="me-3 bg-white bg-opacity-10 p-2 rounded-circle">
                            <i class="bi bi-tags fs-4"></i>
                        </div>
                        <div>
                            <h4 class="mb-0 fw-semibold">Create New Category</h4>
                            <p class="mb-0 opacity-75 small">Add a new product category to your inventory</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4">
                            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('categories.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf

                        <!-- Category Name -->
                        <div class="mb-4">
                            <label for="category_name" class="form-label fw-semibold">
                                Category Name <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="bi bi-card-heading text-muted"></i>
                                </span>
                                <input type="text" name="category_name" id="category_name"
                                    class="form-control form-control-lg"
                                    value="{{ old('category_name') }}"
                                    placeholder="e.g. Electronics, Clothing" required>
                            </div>
                            @error('category_name')
                                <div class="text-danger small mt-1 ms-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="category_code" class="form-label fw-semibold">Category Code</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-upc-scan text-muted"></i>
                                    </span>
                                    <input type="text" name="category_code" id="category_code"
                                        class="form-control"
                                        value="{{ old('category_code') }}"
                                        placeholder="e.g. CLOTH">
                                </div>
                                @error('category_code')
                                    <div class="text-danger small mt-1 ms-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="status" class="form-label fw-semibold">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea name="description" id="description" rows="3"
                                class="form-control"
                                placeholder="Brief description about this category...">{{ old('description') }}</textarea>
                        </div>

                        <!-- Form Actions -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-arrow-left me-2"></i> Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-plus-circle me-2"></i> Create Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #3a7bd5 0%, #00d2ff 100%);
    }
    .card {
        margin-top: 2rem;
    }
    .card-header {
        padding: 1.5rem;
    }
    .form-control, .form-select {
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
        border: 1px solid #ced4da;
    }
    .form-control:focus, .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    .input-group-text {
        border-radius: 0.5rem 0 0 0.5rem !important;
        background-color: #f8f9fa;
    }
    .btn {
        border-radius: 0.5rem;
        padding: 0.5rem 1.5rem;
    }
</style>
@endsection
