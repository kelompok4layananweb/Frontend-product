@extends('layout.template')


@section('title', 'Form RFQ (Request For Quotation)')
@section('page', 'RFQ')
@section('page-link', route('master.produk.index'))

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('dist/libs/select2/dist/css/select2.min.css') }}">
@endsection

@section('contents')

    @include('layout.partials.breadcrumb')

    <label>
        <input type="checkbox" id="checkbox1" name="checkbox_form" value="form1">
        Tampilkan Form 1
    </label>

    <label>
        <input type="checkbox" id="checkbox2" name="checkbox_form" value="form2">
        Tampilkan Form 2
    </label>

    <!-- Form 1 -->
    <div id="form1" style="display: none;">
        @include('pages.blade1.index')
    </div>

    <!-- Form 2 -->
    <div id="form2" style="display: none;">
        @include('pages.blade2.index')
    </div>
        @endsection

        @section('page-scripts')
            <script src="{{ asset('dist/libs/select2/dist/js/select2.full.min.js') }}"></script>
            <script src="{{ asset('dist/libs/select2/dist/js/select2.min.js') }}"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#checkbox1').change(function() {
        if ($(this).is(':checked')) {
            $('#form1').show();
            $('#form2').hide();
            $('#checkbox2').prop('checked', false);
        } else {
            $('#form1').hide();
        }
    });

    $('#checkbox2').change(function() {
        if ($(this).is(':checked')) {
            $('#form2').show();
            $('#form1').hide();
            $('#checkbox1').prop('checked', false);
        } else {
            $('#form2').hide();
        }
    });
});
</script>

        @endsection
