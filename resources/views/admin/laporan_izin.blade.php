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
                                                            <form>
                                                              <label for="start-date">Start date:</label>
                                                              <input type="date" id="start-date" name="start-date">

                                                              <label for="end-date">End date:</label>
                                                              <input type="date" id="end-date" name="end-date">

                                                              <a id="btn-f" class="btn-light" href="{{ route('cetak_izin_admin') }}" target="_blank">Filter</a>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
@endsection