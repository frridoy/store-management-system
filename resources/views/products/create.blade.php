@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h2 class="mb-4 text-center">Create Product</h2>

                {{-- Success message --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- Validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Product Name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Category --}}
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                        <select name="category_id" id="category_id"
                            class="form-select @error('category_id') is-invalid @enderror" required>
                            <option value="">-- Select Category --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_code }} -
                                    {{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="3"
                            class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Price --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Price <span class="text-danger">*</span></label>
                        <input type="number" name="price" id="price" step="0.01"
                            class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Discount Price --}}
                    <div class="mb-3">
                        <label for="discount_price" class="form-label">Discount Price</label>
                        <input type="number" name="discount_price" id="discount_price" step="0.01"
                            class="form-control @error('discount_price') is-invalid @enderror"
                            value="{{ old('discount_price') }}">
                        @error('discount_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Stock --}}
                    <div class="mb-3">
                        <label for="stock_quantity" class="form-label">Stock Quantity <span
                                class="text-danger">*</span></label>
                        <input type="number" name="stock_quantity" id="stock_quantity"
                            class="form-control @error('stock_quantity') is-invalid @enderror"
                            value="{{ old('stock_quantity') }}" required>
                        @error('stock_quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Sold Quantity --}}
                    <div class="mb-3">
                        <label for="sold_quantity" class="form-label">Sold Quantity</label>
                        <input type="number" name="sold_quantity" id="sold_quantity"
                            class="form-control @error('sold_quantity') is-invalid @enderror"
                            value="{{ old('sold_quantity') }}">
                        @error('sold_quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Available Quantity --}}
                    <div class="mb-3">
                        <label for="available_quantity" class="form-label">Available Quantity</label>
                        <input type="number" name="available_quantity" id="available_quantity"
                            class="form-control @error('available_quantity') is-invalid @enderror"
                            value="{{ old('available_quantity') }}">
                        @error('available_quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- SKU --}}
                    <div class="mb-3">
                        <label for="sku" class="form-label">SKU <span class="text-danger">*</span></label>
                        <input type="text" name="sku" id="sku"
                            class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku') }}" required>
                        @error('sku')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="mb-3">
                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror"
                            required>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Multiple Images --}}
                    <div class="mb-3">
                        <label for="images" class="form-label">Product Images</label>
                        <input type="file" name="images[]" id="images"
                            class="form-control @error('images.*') is-invalid @enderror" multiple>
                        <div id="image-preview" class="mt-3 row"></div>
                        @error('images.*')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('images').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('image-preview');
            previewContainer.innerHTML = '';

            const files = event.target.files;

            Array.from(files).forEach(file => {
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        const col = document.createElement('div');
                        col.className = 'col-md-3 mb-3';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = 'Selected Image';
                        img.className = 'img-thumbnail';
                        img.style.height = '150px';
                        img.style.objectFit = 'cover';

                        col.appendChild(img);
                        previewContainer.appendChild(col);
                    };

                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush
