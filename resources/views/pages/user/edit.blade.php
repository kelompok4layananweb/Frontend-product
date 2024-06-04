@extends('layout.template')

@section('title','Ubah Pengguna')
@section('page','Pengguna')
@section('page-link', route('user.index'))

@section('page-styles')
@endsection

@section('contents')

@include('layout.partials.breadcrumb')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('user.update',$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4 row align-items-center">
                        <label for="name" class="form-label fw-semibold col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$user->name) }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="email" class="form-label fw-semibold col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email',$user->email) }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="password" class="form-label fw-semibold col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="password_confirmation" class="form-label fw-semibold col-sm-3 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="role" class="form-label fw-semibold col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                                <option value="Karyawan" @selected( old('role',$user->role)=='Karyawan' )>Karyawan</option>
                                <option value="Administrator" @selected( old('role',$user->role)=='Administrator' )>Administrator</option>
                            </select>
                            @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <BUtton class="btn btn-primary">Simpan</BUtton>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
@endsection
