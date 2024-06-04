@extends('layout.template')

@section('title', 'List Project WO')
@section('page', 'Project WO')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
@endsection

@section('contents')

    @include('layout.partials.breadcrumb')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="accordion" id="accordionSearching">
                <div class="accordion-item rounded">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse"
                            data-bs-target="#searchdata" aria-expanded="false" aria-controls="searchdata">
                            <i class="fa fa-search" style="margin-right: 5px;"></i> Pencarian Data
                        </button>
                    </h2>
                    <div id="searchdata" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionSearching">
                        <div class="accordion-body">
                            <form id="formReport" method="GET" class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="control-label">Client </label>
                                    <div class="input-group">
                                        <select class="form-control select2" required onchange="filter()" id="user"
                                            name="user">
                                            <option value="">Pilih Client </option>
                                            {{-- @foreach ($user as $u)
                                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="control-label">Departement </label>
                                    <div class="input-group">
                                        <select class="form-control select2" required onchange="filter()" id="user"
                                            name="user">
                                            <option value="">Pilih Departement </option>
                                            {{-- @foreach ($user as $u)
                                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="control-label">No. PO </label>
                                    <div class="input-group">
                                        <select class="form-control select2" required onchange="filter()" id="user"
                                            name="user">
                                            <option value="">Pilih No. PO </option>
                                            {{-- @foreach ($user as $u)
                                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="control-label">No. WO </label>
                                    <div class="input-group">
                                        <select class="form-control select2" required onchange="filter()" id="user"
                                            name="user">
                                            <option value="">Pilih NO. WO </option>
                                            {{-- @foreach ($user as $u)
                                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                                @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="datatables">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-md-4 col-xl-3">
                    </div>
                    <div
                        class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        <a href="{{ route('master.merek.create') }}" id="btn-add-contact"
                            class="btn btn-info d-flex align-items-center">
                            <i class="ti ti-plus text-white me-1 fs-5"></i> Tambah Produk
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table border table-bordered text-nowrap" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">No. PENAWARAN</th>
                                <th scope="col">Nama Project</th>
                                <th scope="col">Harga RFQ</th>
                                <th scope="col">No. PO</th>
                                <th scope="col">Harga PO</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="{{ asset('dist/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/js/datatable/datatable-basic.init.js') }}"></script>

    <script>
        $(function() {
            var table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: '{{ route('master.merek.index') }}',
                    data: function(d) {
                        // d.company_id = $('#company_id').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name',
                        render: function(data, type, row) {
                            var html = '' +
                                '    <div class="media-body align-self-center">' +
                                '      <div>' + row.nopo + '</div>' +
                                '      <div> No. WO :' + row.wo + '</div>' +
                                '      <div> No. CR :' + row.cr + '</div>' +
                                '      <div> BAST :' + row.bast + '</div>' +
                                '    </div>' +
                                '  </div>' +
                                '';
                            return html;
                        }

                    },
                    {
                        data: 'project',
                        name: 'project',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'rfq',
                        name: 'rfq',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            // Menggunakan JavaScript untuk memformat nilai angka ke format Rupiah
                            var formattedValue = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(data);
                            return formattedValue;
                        }
                    },

                    {
                        data: 'nopo',
                        name: 'nopo',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'hargapo',
                        name: 'hargapo',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            // Menggunakan JavaScript untuk memformat nilai angka ke format Rupiah
                            var formattedValue = new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(data);
                            return formattedValue;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            $('.searchDT').on('change', function() {
                table.draw();
            });
        });
    </script>
@endsection
