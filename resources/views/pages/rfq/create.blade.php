@extends('layout.template')


@section('title', 'Form RFQ (Request For Quotation)')
@section('page', 'RFQ')
@section('page-link', route('master.produk.index'))

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/select2/dist/css/select2.min.css') }}">
@endsection

@section('contents')

    @include('layout.partials.breadcrumb')


    <div class="mb-3">
        <label class="form-check-label form-label" for="online_agreement" style="margin-right: 20px;">
            <input class="form-check-input" type="radio" name="agreement_type" id="online_agreement" value="create-form2">
            Online Agreement
        </label>

        <label class="form-check-label form-label" for="lumpsum">
            <input class="form-check-input" type="radio" name="agreement_type" id="lumpsum" value="create-form1">
            Lumpsum
        </label>
    </div>

    <!-- Container untuk menampung komponen -->
    <div id="form-container"></div>
    </div>
@endsection

@section('page-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('input[type="radio"]').forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Uncheck all other checkboxes
                    document.querySelectorAll('input[type="radio"]').forEach(function(
                        otherCheckbox) {
                        if (otherCheckbox !== checkbox) otherCheckbox.checked = false;
                    });

                    // Load the appropriate form component
                    if (checkbox.checked) {
                        let componentName = checkbox.value;
                        loadComponent(componentName);
                    } else {
                        document.getElementById('form-container').innerHTML = '';
                    }
                });
            });

            function loadComponent(componentName) {
                // Use fetch API to get the component's HTML
                fetch(`/load-component/${componentName}`)
                    .then(response => response.text())
                    .then(html => {
                        document.getElementById('form-container').innerHTML = html;
                    })
                    .catch(error => console.error('Error loading component:', error));
            }
        });
    </script>

    <script>
        $("body").on('select2', '#brand_id', function() {
            ajax: {
                url: "{{ route('option.brand') }}",
                dataType: 'json',
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
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

    <script>
        $(document).ready(function() {
            // Tombol untuk menambahkan baris
            $("body").on('click', '#addRow2', function() {
                var html = '';
                html += '<div class="card">';
                html += ' <div class="card-body">';
                html += ' <div class="row">';
                html += '<div class="col-md-2">';
                html +=
                    ' <label for="service_spec" class="form-label fw-semibold col-form-label col-mt-5 ">Service Spec Outline <span class="text-danger">*</span></label>';
                html += '<input type="text" class="form-control " id="service_spec" name="service_spec">';
                html += '</div>';
                html += '<div class="col-md-2">';
                html +=
                    ' <label for="no_material" class="form-label fw-semibold col-form-label col-mt-5 ">No.Material  <span class="text-danger">*</span></label>';
                html += '<input type="text" class="form-control " id="no_material" name="no_material">';
                html += '</div>';
                html += '<div class="col-md-2">';
                html +=
                    ' <label for="unit" class="form-label fw-semibold col-form-label col-mt-5 ">Unit <span class="text-danger">*</span></label>';
                html += '<input type="text" class="form-control " id="unit" name="unit">';
                html += '</div>';
                html += '<div class="col-md-2">';
                html +=
                    '<label for="qty" class="form-label fw-semibold col-form-label col-mt-5 ">Quantity<span class="text-danger">*</span></label>';
                html += '<input type="number" class="form-control" required id="qty" name="qty">';
                html += '</div>';
                html += '<div class="col-md-2">';
                html +=
                    '<label for="priice" class="form-label fw-semibold col-form-label col-mt-5 ">Price (Rp)<span class="text-danger">*</span></label>';
                html += '<input type="number" class="form-control" required id="price"name="price">';
                html += '</div>';
                html += '<div class="col-md-2">';
                html +=
                    '<label for="total" class="form-label fw-semibold col-form-label col-mt-5 ">Total (Rp)</label>';
                html += '<input type="number" class="form-control" id="total"name="total">';
                html += '</div>';
                html += '</div>';
                html += '<div class="row">';
                html += '<div class="col-md-5">';
                html +=
                    '<label for="description" class="form-label fw-semibold col-form-label col-mt-5 ">Keterangan</label>';
                html +=
                    '<input type="text" class="form-control" required id="description"name="description">';
                html += '</div>';
                html += '</div>';

                $('#inputFormRow').append(html);
            });
            // Tombol untuk menghapus baris
            $(document).on('click', '#removeRow', function() {
                $(this).closest('.card').remove();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Tombol untuk menambahkan baris
            $("body").on('click', '#addRow1', function() {
                var html = '';
                html += '<div class="card">';
                html += ' <div class="card-body">';
                html += ' <div class="row">';
                html += '<div class="col-md-3">';
                html +=
                    '<label for="description_job[]">Description Job<span class="text-danger">*</span></label>';
                html +=
                    '<input type="text" class="form-control " id="description_job[]" name="description_job[]">';
                html += '</div>';
                html += '<div class="col-md-2">';
                html += '<label for="qty[]" >Quantity<span class="text-danger">*</span></label>';
                html += '<input type="number" class="form-control qty" required id="qty[]" name="qty[]">';
                html += '</div>';
                html += '<div class="col-md-2">';
                html +=
                    '<label for="price[]" >Price (Rp)<span class="text-danger">*</span></label>';
                html +=
                    '<input type="number" class="form-control price" required id="price[]"name="price[]">';
                html += '</div>';
                html += '<div class="col-md-2">';
                html +=
                    '<label for="total[]" >Total (Rp)</label>';
                html +=
                    '<input type="number" class="form-control total" readonly id="total[]"name="total[]">';
                html += '</div>';
                html += '<div class="col-md-2 d-flex align-items-end">';
                html +=
                    '<button type="button"  id="removeRow" class="btn btn-danger form-control">Hapus</button>';
                html += '</div>';
                html += '</div>';
                html += '<div class="row">';
                html += '<div class="col-md-5">';
                html +=
                    '<label for="description[]">Keterangan</label>';
                html +=
                    '<input type="text" class="form-control" required id="description[]"name="description[]">';
                html += '</div>';
                html += '</div>';

                $('#inputFormRow').append(html);
            });
            // Tombol untuk menghapus baris
            $(document).on('click', '#removeRow', function() {
                $(this).closest('.card').remove();
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            // Inisialisasi jumlah total
            var totalSemua = 0;
            var pajakRate = 0.11; // Tarif pajak 11%
            var includeTax = $("#include_tax").prop("checked");

            // Event handler untuk input pada kolom "Qty" dan "Harga"
            $("body").on("input", ".qty, .price", function() {
                var row = $(this).closest('.card');
                var qty = parseFloat(row.find('.qty').val()) || 0;
                var harga = parseFloat(row.find('.price').val()) || 0;
                var total = qty * harga;
                // Update nilai total pada kolom "Total"
                row.find('.total').val(total);

                // Menghitung jumlah total keseluruhan
                totalSemua = hitungTotalSemua();
                if (includeTax) {
                    // Jika checkbox dicentang, tambahkan pajak
                    totalSemua += totalSemua * pajakRate;
                }
                updateJumlahTotal(totalSemua);
            });

            // Event handler untuk tombol "Remove"
            $("body").on("click", ".btn-danger", function() {
                // Hapus baris yang sesuai saat tombol "Remove" diklik
                $(this).closest('.card').remove();

                // Setelah menghapus baris, update jumlah total
                totalSemua = hitungTotalSemua();
                if (includeTax) {
                    // Jika checkbox dicentang, tambahkan pajak
                    totalSemua += totalSemua * pajakRate;
                }
                updateJumlahTotal(totalSemua);
            });

            // Event handler untuk checkbox
            $("body").on("change", "#include_tax", function() {
                // Ketika checkbox diubah, hitung ulang jumlah total
                includeTax = $(this).prop("checked");
                totalSemua = hitungTotalSemua();
                if (includeTax) {
                    // Jika checkbox dicentang, tambahkan pajak
                    totalSemua += totalSemua * pajakRate;
                }
                updateJumlahTotal(totalSemua);
            });

            function hitungTotalSemua() {
                var totalSemua = 0;
                // Mengakumulasi total dari setiap baris
                $(".total").each(function() {
                    var totalBaris = parseFloat($(this).val()) || 0;
                    totalSemua += totalBaris;
                });
                return totalSemua;
            }

            function updateJumlahTotal(total) {
                // Update nilai pada elemen dengan ID "total_price"
                $("#total_price").val(total).trigger('change');
            }

            // Menghitung jumlah total keseluruhan pada awal halaman dimuat
            totalSemua = hitungTotalSemua();
            if (includeTax) {
                // Jika checkbox dicentang saat halaman dimuat, tambahkan pajak
                totalSemua += totalSemua * pajakRate;
            }
            updateJumlahTotal(totalSemua);
        });
    </script>

@endsection
