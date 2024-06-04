@extends('layout.template')

@section('title','Ubah Merek')
@section('page','Merek')
@section('page-link', route('master.merek.index'))

@section('page-styles')
@endsection

@section('contents')

@include('layout.partials.breadcrumb')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('master.merek.update',$brand->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4 row align-items-center">
                        <label for="name" class="form-label fw-semibold col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$brand->name) }}">
                            @error('name')
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