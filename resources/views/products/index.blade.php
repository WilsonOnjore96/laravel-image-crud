@extends('layouts.product')
@section('title','Home')
@section('content')
<section class="mb-4 mt-4">
    <h1 class="text-center">All Products</h1>
    <div class="container">
      @if($message = Session::get('message'))
      <div class="row">
         <div class="col-md-6 m-auto">
            <div class="alert alert-{{ Session::get('status') }} alert-dismissible fade show" role="alert">
                <p>{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
         </div>
      </div>
      @endif
      <div class="row">
        <!---Dynamic Columns----->
        @foreach($products as $product)
        <div class="col-md-4 mb-3">
            <div class="card" style="width: 18rem; ">
                <img src="{{ asset('storage/images/'.$product->image) }}" class="card-img-top" alt="product-image" style="height: 200px;">
                <div class="card-body">
                  <h5 class="card-title">{{ $product->name }}</h5>
                  <p class="card-text">The price is $ {{ $product->price }}.</p>
                  <a href="{{ route('products.show',$product->id) }}" class="btn btn-primary">Show Product</a>
                </div>
            </div>
        </div>
        @endforeach
        <!---EndDynamic------->
      </div>
    </div>
</section>
@endsection
