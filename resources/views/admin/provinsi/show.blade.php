@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Show Provinsi</div>
                <div class="card-body">
                        <div class="form-group">
                            <label>Kode Provinsi</label>
                            <input type="number" name="kode_nama" value="{{ $provinsi->kode_nama }}" class="form-control"  readonly>
                            <label>Nama Provinsi</label>
                            <input type="text" name="nama_provinsi" value="{{ $provinsi->nama_provinsi }}" class="form-control"  readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{ url()->previous() }}" class="btn btn-primary btn-block">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
