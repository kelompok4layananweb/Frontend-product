@extends('layout.template')

@section('title', 'Dashboard')
@section('page', 'Dashboard')

@section('page-styles')
@endsection

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center gap-4 mb-4">
                <div class="position-relative">
                    <div class="border border-2 border-primary rounded-circle">
                        <img src="{{ asset('dist/images/profile/user-1.jpg') }}" class="rounded-circle m-1" alt="user1"
                            width="60" />
                    </div>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill"><span
                            class="visually-hidden">unread messages</span>
                    </span>
                </div>
                <div>
                    <h3 class="fw-semibold">Hi, <span class="text-dark">{{ auth()->user()->name }}</span>
                    </h3>
                    <span>  Cheers, and happy activities - {{ \Carbon\Carbon::now()->format('F j, Y') }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card text-white" style="background-color: #2F2E7A;">
                        <div class="card-body">
                            <div class="d-flex no-block align-items-center">
                                <a href="JavaScript: void(0);"><i class="ti ti-user display-6 text-white"
                                        title="ETH"></i></a>
                                <div class="ms-3 mt-2">
                                    <h4 class=" mb-0 text-white">
                                        Lorem Ipsum
                                    </h4>
                                    <h5 class="text-white">$3589.00k</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card text-white" style="background-color: #FCB040;">
                        <div class="card-body">
                            <div class="d-flex no-block align-items-center">
                                <a href="JavaScript: void(0);"><i class="ti ti-archive display-6 text-white"
                                        title="LTC"></i></a>
                                <div class="ms-3 mt-2">
                                    <h4 class=" mb-0 text-white">
                                        Lorem Ipsum
                                    </h4>
                                    <h5 class="text-white">$900.00k</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card text-white" style="background-color: #2F2E7A;">
                        <div class="card-body">
                            <div class="d-flex no-block align-items-center">
                                <a href="JavaScript: void(0);"><i class="ti ti-file display-6 text-white"
                                        title="BTC"></i></a>
                                <div class="ms-3 mt-2">
                                    <h4 class=" mb-0 text-white">
                                        Lorem Ipsum
                                    </h4>
                                    <h5 class="text-white">$284.50k</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card text-white" style="background-color: #FCB040;">
                        <div class="card-body">
                            <div class="d-flex no-block align-items-center">
                                <a href="JavaScript: void(0);"><i class="ti ti-clipboard-data display-6 text-white"
                                        title="AMP"></i></a>
                                <div class="ms-3 mt-2">
                                    <h4 class=" mb-0 text-white">
                                        Lorem Ipsum
                                    </h4>
                                    <h5 class="text-white">$650.80k</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center fw-semibold">Total Project</h5>
                    <div class="row">
                        <div class="col-4 d-flex flex-column align-items-center px-lg-1">
                            <div id="chart_po_masuk" class="chart mb-3"></div>
                            <p>PO masuk (NB)</p>
                            <button class="btn text-white" style="background-color: #FCB040;">Cek Detail</button>
                        </div>
                        <div class="col-4 d-flex flex-column align-items-center px-lg-1">
                            <div id="chart_po_belum_jadi_invoice" class="chart mb-3"></div>
                            <p>PO belum jadi Invoice</p>
                            <button class="btn text-white" style="background-color: #FCB040;">Cek Detail</button>
                        </div>
                        <div class="col-4 d-flex flex-column align-items-center px-lg-1">
                            <div id="chart_invoice_masuk" class="chart mb-3"></div>
                            <p>Invoice Masuk</p>
                            <button class="btn text-white" style="background-color: #FCB040;">Cek Detail</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Data persetujuan yang masuk</h5>
                    <div class="card-body">
                        @foreach ($approvals as $approval)
                            <div
                                style="background-color: #F2F2F2; border-radius: 19px; padding: 19px 19px; margin-bottom: 19px; display: flex; align-items: center; justify-content: space-between;">
                                <span style="color: #333333;">{{ $approval->document_name }} dari
                                    {{ $approval->company_name }}</span>
                                <div style="height: 20px; width: 20px; background-color: red; border-radius: 50%;"></div>
                            </div>
                        @endforeach
                        <a href="#"
                            style="display: block; color: #007BFF; margin-top: 20px; text-align: center;">Lihat Lainnya</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center mb-9">
                        <div>
                            <h5 class="card-title fw-semibold">Lorem Ipsum</h5>
                            <p class="card-subtitle">Lorem Ipsum</p>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content mt-3">
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="table-responsive">
                                <div id="chart23"></div>
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
        createChart("#chart_po_belum_jadi_invoice", {{ $series2 }});
        createChart("#chart_invoice_masuk", {{ $series3 }});
    </script>


<script>
    // Data dummy untuk chart
    var options = {
        chart: {
            type: 'bar',
            height: 350,
        },
        series: [{
            name: 'Sales',
            data: [30, 40, 45, 50, 49, 60, 70, 91, 125]
        }],
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep']
        },
        colors: ['#FCB040'] // Menambahkan warna bar di sini
    }

    var chart = new ApexCharts(
        document.querySelector("#chart23"),
        options
    );

    chart.render();
</script>

@endsection
