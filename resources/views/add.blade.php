@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Add Books Section</h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">Add new Books here</h5>
            <p class="card-text"></p>
            <button type="button" class="btn btn-secondary btn-lg">
                <a href="" class="text-decoration-none text-white">Add Books</a>
            </button>
            <button type="button" class="btn btn-secondary btn-lg">
                <a href="{{ route('viewProduct') }}" class="text-decoration-none text-white">Show All Books</a>
            </button>
            <button type="button" class="btn btn-secondary btn-lg">
                <a href="{{ url('viewProductList') }}" class="text-decoration-none text-white">Show Product List</a>
            </button>
        </div>
    </div>
    <br><br>
    <div class="card">
        <div class="card-header">
            <h3>Add Category Collection</h3>
        </div>
        <div class="card-body">
            <h5 class="card-title">Add Category Collection here</h5>
            <p class="card-text"></p>
            <button type="button" class="btn btn-secondary btn-lg">
                <a href="addCategory" class="text-decoration-none text-white">Add Category</a>
            </button>
            <button type="button" class="btn btn-secondary btn-lg">
                <a href="viewCategory" class="text-decoration-none text-white">Show All Category</a>
            </button>
        </div>
    </div>
</div>
@endsection
