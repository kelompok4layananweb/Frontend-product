@extends('layout.template')


@section('title', 'Form RFQ (Request For Quotation)')
@section('page', 'RFQ')
@section('page-link', route('master.produk.index'))

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/select2/dist/css/select2.min.css') }}">
@endsection

@section('contents')

    @include('layout.partials.breadcrumb')

    {{-- <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-check-label form-label" for="online_agreement" style="margin-right: 20px;">
                            <input class="form-check-input" type="radio" name="agreement_type" id="online_agreement"
                                value="online" {{ old('agreement_type') == 'online' ? 'checked' : '' }}>
                            Online Agreement
                        </label>
                        <label class="form-check-label form-label" for="lumpsum">
                            <input class="form-check-input" type="radio" name="agreement_type" id="lumpsum"
                                value="lumpsum" {{ old('agreement_type') == 'lumpsum' ? 'checked' : '' }}>
                            Lumpsum
                        </label>
                    </div>
                    <form action="{{ route('master.produk.store') }}" method="POST" id="">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="date" class="form-label fw-semibold col-form-label col-mt-5 ">Tanggal
                                    Pembuatan QA <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('date') is-invalid @enderror"
                                    id="date" name="date" value="{{ old('date') }}">
                                @error('date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="your_new_field" class="form-label fw-semibold col-form-label col-mt-5 ">Pilih
                                    Penawaran</label>
                                <select class="form-select @error('brand_id') is-invalid @enderror" id="brand_id"
                                    name="brand_id">
                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="number_cr" class="form-label fw-semibold col-form-label col-mt-5 ">Nomor
                                    CR</label>
                                <input type="text" class="form-control @error('number_cr') is-invalid @enderror"
                                    id="number_cr" name="number_cr" value="{{ old('number_cr') }}">
                                @error('number_cr')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="job" class="form-label fw-semibold col-form-label col-mt-5 ">Quotation Job
                                    <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('job') is-invalid @enderror" required
                                    id="job" name="job" value="{{ old('job') }}">
                                @error('job')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="offer_number " class="form-label fw-semibold col-form-label col-mt-5 ">Nomor
                                    Penawaran <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('offer_number') is-invalid @enderror"
                                    required id="offer_number" name="offer_number" value="{{ old('offer_number') }}">
                                @error('offer_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div style="margin-top: 30px; margin-bottom: 10px;">
                            <label class="form-label fw-semibold col-form-label col-mt-5 "
                                style="font-size: 18px;"><strong>Detail</strong></label>
                        </div>
                        <div class="col-12 col-lg-12" id="inputFormRow">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="description_job"
                                                class="form-label fw-semibold col-form-label col-mt-5 ">Description Job
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control " id="description_job"
                                                name="description_job">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="qty"
                                                class="form-label fw-semibold col-form-label col-mt-5 ">Quantity<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" required id="qty"
                                                name="qty">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="price"
                                                class="form-label fw-semibold col-form-label col-mt-5 ">Price (Rp)<span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control" required
                                                id="price"name="price">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="total"
                                                class="form-label fw-semibold col-form-label col-mt-5 ">Total
                                                (Rp)</label>
                                            <input type="number" class="form-control" readonly
                                                id="total"name="total">
                                        </div>
                                        <div class="col-md-2 d-flex align-items-end">
                                            <button type="button" id="removeRow"
                                                class="btn btn-danger form-control">Hapus</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label for="description"
                                                class="form-label fw-semibold col-form-label col-mt-5 ">Keterangan</label>
                                            <input type="text" class="form-control" required
                                                id="description"name="description">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button id="addRow" type="button" class="btn btn-info">Tambah Inputan</button>

                        <div style="margin-top: 30px; margin-bottom: 10px;">
                            <input type="checkbox" name="include_tax" id="include_tax" value="1"
                                style="margin-right: 5px;" {{ old('include_tax') ? 'checked' : '' }}>
                            <label for="include_tax" style="font-size: 16px;"
                                class="form-label fw-semibold col-form-label col-mt-5 ">Total Harga Termasuk PPN</label>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label for="tota_price " class="form-label fw-semibold col-form-label col-mt-5 ">Total
                                    Harga</label>
                                <input type="text" class="form-control @error('tota_price') is-invalid @enderror"
                                    readonly id="tota_price" name="tota_price" value="{{ old('tota_price') }}">
                                @error('tota_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div style="margin-top: 30px; margin-bottom: 10px;">
                            <label class="form-label fw-semibold col-form-label col-mt-5 "
                                style="font-size: 18px;"><strong>Penandatagan</strong></label>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label for="responsible" class="form-label">Penanggung Jawab <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('responsible') is-invalid @enderror"
                                    id="responsible" name="responsible" required placeholder="Nama Penanggung Jawab...">
                                @error('responsible')
                                    <div class="invalid-feedback">Tidak boleh kosong</div>
                                @enderror

                                <div class="mb-8">
                                    <label for="company" class="form-label">Nama Perusahaan/Organisasi/Kelompok</label>
                                    <input type="text" class="form-control" id="company" name="company"
                                        placeholder="Nama Perusahaan/Organisasi/Kelompok">
                                </div>

                                <div class="mb-8">
                                    <label for="name_hod" class="form-label">HOD dari klien <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name_hod') is-invalid @enderror"
                                        id="name_hod" name="name_hod" required placeholder="Nama">
                                    @error('name_hod')
                                        <div class="invalid-feedback">Tidak boleh kosong</div>
                                    @enderror
                                </div>

                            </div>

                            <!-- HOD dari Klien -->

                            <div class="row">
                                <div class="col">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a class="btn btn-danger" href="#">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div> --}}

    <div class="mb-3">
        <label class="form-check-label form-label" for="online_agreement" style="margin-right: 20px;">
            <input class="form-check-input" type="radio" type="checkbox" id="checkbox1" value="create-form2">
            Online Agreement
        </label>

        <label class="form-check-label form-label" for="lumpsum">
            <input class="form-check-input" type="radio" type="checkbox" id="checkbox1" value="create-form1">
            Lumpsum
        </label>
    </div>

    <!-- Container untuk menampung komponen -->
    <div id="form-container"></div>
    </div>
@endsection

@section('page-scripts')

@endsection
