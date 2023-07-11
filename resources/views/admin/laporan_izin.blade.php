@extends('layouts.main_admin')

@section('isi_admin')
<div class="container-fluid">
    <!-- Begin Page Content -->
    <h1 id="judul">Cetak Laporan<a href="{{ route('laporan_survey') }}"> Survey /</a><a href="{{ route('laporan_izin') }}"> Izin</a></h1>
    <br>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Laporan Izin</h5>
            <form id="filter-form" action="{{ route('cetak_izin_admin') }}" method="GET">
            <label for="start_date">Start date:</label>
                <input type="date" id="start_date" name="start_date">

                <label for="end_date">End date:</label>
                <input type="date" id="end_date" name="end_date">

                <button id="filter-btn" type="submit" class="btn btn-light">Filter</button>
            </form>
        </div>
    </div>
</div>
@endsection