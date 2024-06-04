@extends('layout.template')

@section('title','Tambah Produk')
@section('page','Produk')
@section('page-link', route('master.produk.index'))

@section('page-styles')
<link rel="stylesheet" href="{{ asset('dist/libs/select2/dist/css/select2.min.css') }}">
@endsection

@section('contents')

@include('layout.partials.breadcrumb')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('master.produk.store') }}" method="POST">
                    @csrf
                    <div class="mb-4 row align-items-center">
                        <label for="name" class="form-label fw-semibold col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="brand_id" class="form-label fw-semibold col-sm-3 col-form-label">Merek</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('text') is-invalid @enderror" id="merek" name="merek" value="{{ old('merek') }}">
                            @error('merek')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="min_stock" class="form-label fw-semibold col-sm-3 col-form-label">Stok Minimal</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @error('min_stock') is-invalid @enderror" id="min_stock" name="min_stock" value="{{ old('min_stock') }}">
                            @error('min_stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="price" class="form-label fw-semibold col-sm-3 col-form-label">Harga</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 row align-items-center">
                        <label for="unit_id" class="form-label fw-semibold col-sm-3 col-form-label">Jenis</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('price') is-invalid @enderror" id="Jenis" name="Jenis" value="{{ old('Jenis') }}">
                            @error('price')
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
<script src="{{ asset('dist/libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('dist/libs/select2/dist/js/select2.min.js') }}"></script>

<script>
    $('#brand_id').select2({
        ajax: {
            url: "{{ route('option.brand') }}",
            dataType: 'json',
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('#unit_id').select2({
        ajax: {
            url: "{{ route('option.unit') }}",
            dataType: 'json',
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
@endsection
