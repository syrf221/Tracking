@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   Tambah Data
                </div>
                <div class="card-body">
                    <form action="{{route('prakerin.store')}}" class="form-horizontal m-t-30" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                            @csrf
                            @livewireStyles
                            @livewire('tracking')
                            @livewireScripts
                            </div>
                            <div class="col">
                                
                                <div class="form-group">
                                    <label>Jumlah Positif</label>
                                    <input type=number name=jumlah_positif class=form-control  required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Sembuh</label>
                                    <input type=number name=jumlah_sembuh class=form-control  required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Meninggal</label>
                                    <input type=number name=jumlah_meninggal class=form-control  required>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type=date name=tanggal class=form-control required>
                                </div>
                            </div>
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
© 2021 GitHub, Inc.