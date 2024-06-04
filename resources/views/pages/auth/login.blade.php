@extends('layout.auth')

@section('title','Login')

@section('page-styles')
@endsection

@section('contents')
<div class="row justify-content-center w-100">
    <div class="col-md-8 col-lg-6 col-xxl-3">
        <div class="card mb-0">
            <div class="card-body">
                <a href="/" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                    <img src="{{ asset('dist/images/logos/dark-logo.svg') }}" width="180" alt="">
                </a>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input class="form-check-input primary" type="checkbox" name="remember" value="1" id="flexCheckChecked" checked>
                            <label class="form-check-label text-dark" for="flexCheckChecked">
                                Remeber this Device
                            </label>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
@endsection