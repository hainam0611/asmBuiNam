@extends('products.layout')
@section('content')
    <div><a class="btn btn-primary" href={{ url('/admin/products') }}>Back</a></div> 

    <div class="container">
        <h2>Create Product</h2>
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="prodname">Product Name</label>
                <input type="text" class="form-control @error('prodname') is-invalid @enderror" id="prodname" name="prodname" value="{{ old('prodname') }}">
                @error('prodname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>            
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" name="category_id">
                    @foreach ($categories as $item)
                      <option value="{{$item->id}}">{{$item->catname}}</option>  
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
