@extends('layouts.product')
@section('title','Show')
@section('content')
<section class="mb-4 mt-4">
  <div class="container">
    <div class="row ">
        <div class="col-md-6 m-auto">
            <div class="card " style="width: 18rem;">
                <img src="{{ asset('storage/images/'.$product->image) }}" class="card-img-top" alt="product-image">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->name }}</h5>
                  <p class="card-text">The price is $ {{ $product->price }}.</p>
                  <a href="{{ route('products.show',$product->id) }}" class="btn btn-primary mb-2 text-white">Show Product</a>
                  <a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning mb-2 text-white">Edit Product</a>
                  <form action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="delete" class="btn btn-danger text-white"value="Delete Product"/>
                  </form>

                </div>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection