<form action="{{ route('product.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
        @error('name')
            <p class="alert alert-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="company" class="form-label">Company Name</label>
        <input type="text" class="form-control" name="company" value="{{ old('company') }}">
        @error('company')
            <p class="alert alert-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price (in EUR)</label>
        <input type="number" class="form-control" name="price" value="{{ old('price') }}">
        @error('price')
            <p class="alert alert-danger">{{ $message }}</p>
        @enderror
    </div>
    {{-- <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="text" class="form-control" name="image">
    </div> --}}
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" name="description" value="{{ old('description') }}">
        @error('description')
            <p class="alert alert-danger">{{ $message }}</p>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
