@extends('layouts.product')
@section('title','Edit')
@section('content')
<section class="mb-4 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-mb-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>Create Product</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="Name">Name</label>
                                <input type="text" name="name" value="{{ old('name',$product->name) }}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--Price-->
                            <div class="form-group mb-3">
                                <label for="Price">Price</label>
                                <input type="number" min="0" name="price" value="{{ old('price',$product->price) }}"class="form-control @error('price') is-invalid @enderror">
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!---Quantity-->
                            <div class="form-group mb-3">
                                <label for="Quantity">Quantity</label>
                                <input type="number" min="0" value="{{ old('quantity',$product->quantity) }}"name="quantity" class="form-control @error('quantity') is-invalid @enderror">
                                @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!---Image-->
                            <div class="form-group mb-3">
                                <label for="Image">Image</label>
                                <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="formFile">{{ old('image',$product->image) }}
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <!--Sumit-Button-->
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-warning text-white" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection