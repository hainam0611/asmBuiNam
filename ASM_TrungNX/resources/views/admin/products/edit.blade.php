@extends('products.layout')
@section('content')
    <div><a class="btn btn-primary" href={{ url('/admin') }}>Back</a></div>
    <div class="container">
        <h2>Edit Product</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="prodname">Product Name</label>
                <input type="text" class="form-control @error('prodname') is-invalid @enderror" id="prodname" name="prodname" value="{{ old('prodname', $product->prodname) }}">
                @error('prodname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>  
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="10">{{ $product->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                            {{ $category->catname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price', $product->price) }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <label for="image">Image</label>
            <div class="form-group">
                <img src="/images/{{ $product->image }}" width="230px">
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
