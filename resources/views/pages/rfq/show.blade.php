@extends('layout.template')


@section('title', 'Form RFQ (Request For Quotation)')
@section('page', 'View')
@section('page-link', route('project.rfq.index'))

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/select2/dist/css/select2.min.css') }}">
@endsection

@section('contents')

    @include('layout.partials.breadcrumb')

    <div class="row">
        <div class="col-md-12">
            <!-- --------------------- start Tab with Underline ---------------- -->
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                    </div>
                    <ul class="nav nav-underline" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="active-tab" data-bs-toggle="tab" href="#active" role="tab"
                                aria-controls="active" aria-expanded="true">
                                <span>Revisi 1</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content tabcontent-border p-3" id="myTabContent">
                        <div role="tabpanel" class="tab-pane fade show active" id="active" aria-labelledby="active-tab">
                        </div class="row">
                        <div>
                            Judul OA
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <p class="mb-0">No</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-0">370 / PEN.WSA / MACPT / 2023 - 1</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <p class="mb-0">No OA</p>
                            </div>
                            <div class="col-md-5">
                                <p class="mb-0">B04 / 1008 / 46009137</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-12" id="inputFormRow">
                            <div class="card">
                                <div class="card-body">
                                    {{-- <iframe src="{{ asset('dist/images/logos/tesst.pdf') }}" width="100%" height="600px">
                                        This browser does not support PDFs. Please download the PDF to view it: <a href="{{ asset('dist/images/logos/tesst.pdf') }}">Download PDF</a>.
                                    </iframe> --}}
                                    <embed src="{{ asset('dist/images/logos/tesst.pdf') }}" type="application/pdf" width="100%" height="250px" />
                                </div>
                            </div>
                        </div>


                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <div id="chart_po_masuk" class="chart mb-3">
                                    </div>
                                </div>
                                <!-- Ini adalah kolom untuk teks Keterangan -->
                                <div class="col-md-4">
                                    <h2>Progress</h2>
                                    <div class="progress-info">
                                        <h4>Keterangan</h4>
                                        <p>Belum Ada Progress Yang Ditampilkan, Karena Proyek Belum Berjalan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label for="total_price " class="form-label fw-semibold col-form-label col-mt-5 ">Total
                                    Harga</label>
                                <input type="text" class="form-control @error('total_price') is-invalid @enderror"
                                    readonly disabled id="total_price" name="total_price" value="Rp.10.000.000.00">
                                @error('total_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                            <div class="row">
                                <div class="col">
                                    <!-- Tombol Download File -->
                                    <button type="button" class="btn btn-primary m-2">
                                        <i class="fas fa-download"></i> Download File
                                    </button>

                                    <!-- Tombol Print -->
                                    <button type="button" class="btn btn-primary m-2">
                                        <i class="fas fa-print"></i> Print
                                    </button>

                                    <!-- Tombol Send Email -->
                                    <button type="button" class="btn btn-primary m-2">
                                        <i class="fas fa-envelope"></i> Send Email
                                    </button>

                                    <!-- Tombol Upload Dokumen -->
                                    <button type="button" class="btn btn-primary m-2">
                                        <i class="fas fa-upload"></i> Upload Dokumen
                                    </button>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('page-scripts')
    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dist/js/dashboard5.js') }}"></script>

    <script>
        function createChart(selector, seriesValue) {
            console.log("Initializing chart in:", selector, "with series value:", seriesValue); // Untuk debugging
            var options = {
                chart: {
                    type: 'radialBar',
                    height: 250,
                    toolbar: {
                        show: true
                    }
                },
                series: [seriesValue],
                colors: ['#FCB040'],
                labels: ['Completed'],
                plotOptions: {
                    radialBar: {
                        hollow: {
                            margin: 11,
                            size: '70%'
                        },
                        dataLabels: {
                            showOn: 'always',
                            name: {
                                offsetY: -10,
                                show: true,
                                color: '#2F2E7A',
                                fontSize: '13px'
                            },
                            value: {
                                color: '#2F2E7A',
                                fontSize: '30px',
                                show: true,
                                formatter: function(val) {
                                    return val + "%";
                                }
                            }
                        }
                    }
                },
                stroke: {
                    lineCap: 'round',
                },
            };

            var chart = new ApexCharts(document.querySelector(selector), options);
            chart.render();
        }

        createChart("#chart_po_masuk", {{ $series1 }});
    </script>

@endsection
