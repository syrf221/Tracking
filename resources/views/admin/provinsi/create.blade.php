@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Provinsi</div>
                <div class="card-body">
                    <form action="{{route('provinsi.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Kode Provinsi</label>
                            <input type="number" name="kode_nama" class="form-control" placeholder="kode Provinsi" required autofocus>
                            <label>Nama Provinsi</label>
                            <input type="text" name="nama_provinsi" class="form-control" placeholder="Nama Provinsi" required>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
