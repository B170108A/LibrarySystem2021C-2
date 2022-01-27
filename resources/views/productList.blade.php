@extends('layouts.app')
@section('content')
		<div class="row">
          @foreach($products as $product)
                        <div class="col-sm-4">
                            <div class="card h-45">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->name}}</h5>
                                    <a href="{{ route('product.detail', ['id' => $product->id]) }}"><img src="{{ asset('images/') }}/{{$product->image}}" alt="" class="img-fluid"></a>
                                    <div class="card-heading">RM {{$product->price}} </div>
                                    <button style="float:right" class="btn btn-danger btn-xs"><a href="{{ route('product.detail', ['id' => $product->id]) }}">Add to Cart</a></button>
                                </div>
                            </div>
                        </div>
           @endforeach
		</div>
@endsection
