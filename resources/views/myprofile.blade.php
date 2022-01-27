@extends('layouts.app')
@section('content')
<div class="container">
    <div>
        <div>
            <div>
                {{--
                <x-validation-errors />
                <x-success-message /> --}}
                <div class="card">
                    <div class="card-header">
                        <h3> My Profile </h3>
                    </div>
                    <form method="POST" action="">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <div class="card-body">
                                <h5 class="card-title" for="name">Name : </h5>
                                <input id="name" class="block mt-1 w-full" type="text" name="name"
                                    value="{{ auth()->user()->name }}" autofocus disabled />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title" for="name">Email : </h5>
                                <input id="email" class="block mt-1 w-full" type="email" name="email"
                                    value="{{ auth()->user()->email }}" autofocus disabled />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title" for="name">New Password : </h5>
                                <input id="new_password" class="block mt-1 w-full" type="password" name="password"
                                    autocomplete="new-password" />
                            </div>
                            <div class="card-body">
                                <h5 class="card-title" for="name">Confirm Password : </h5>
                                <input id="confirm_password" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" autocomplete="confirm-password" />
                            </div>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end container">
                            <a href="#" class="btn btn-primary btn-lg">Update</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
