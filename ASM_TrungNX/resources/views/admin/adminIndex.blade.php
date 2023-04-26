@extends('products.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Product Management</div>
                <div class="card-body">
                    <p>Here you can manage products.</p>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Go to Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Category Management</div>
                <div class="card-body">
                    <p>Here you can manage categories.</p>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary">Go to Categories</a>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="{{ route('products.index') }}" class="btn btn-primary" style="margin-left: 530px; margin-top: 40px">Go to Products</a>
@endsection