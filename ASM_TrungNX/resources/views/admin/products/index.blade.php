@extends('products.layout')
@section('content')
<div><a class="btn btn-primary" href={{ url('/admin') }}>Back</a></div> 
<a href="{{ url('products/create') }}" class="btn btn-success">Create new</a>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Product List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Content</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->prodname }}</td>
                                        <td><img src="{{ asset('images/'.$product->image) }}" alt="{{ $product->prodname }}" width="100" height="100"></td>
                                        <td>{{ $product->content }}</td>
                                        <td>{{ $product->price }}$</td>
                                        <td>{{ $product->category->catname }}</td>
                                        <td>
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
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