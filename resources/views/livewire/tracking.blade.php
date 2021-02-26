<div>
    <div class="form-group row ">
        <div class="col">
            <label for="provinsi">Provinsi</label>
            <select wire:model="selectedProvinsi" class="form-control">
                <option value="" selected>Pilih Provinsi</option>
                @foreach($provinsi as $provinsis)
                <option value="{{ $provinsis->id }}">{{ $provinsis->nama_provinsi }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row ">
        <div class="col">
            {{-- @if(!is_null($selectedProvinsi)) --}}
            <label for="Kota">Kota</label>
            <select wire:model="selectedKota" class="form-control">
                <option value="" selected>Pilih Kota</option>
                @foreach($kota as $kota)
                <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                @endforeach
            </select>
            {{-- @endif --}}
        </div>
    </div>
    <div class="form-group row ">
        <div class="col">
            {{-- @if (!is_null($selectedKota)) --}}
            <label for="kecamatan">Kecamatan</label>
            <select wire:model="selectedKecamatan" class="form-control">
                <option value="" selected>Pilih Kecamatan</option>
                @foreach($kecamatan as $kecamatans)
                <option value="{{ $kecamatans->id }}">{{ $kecamatans->nama_kecamatan }}</option>
                @endforeach
            </select>
            {{-- @endif --}}
        </div>
    </div>
    <div class="form-group row ">
        <div class="col">
            {{-- @if (!is_null($selectedKecamatan)) --}}
            <label for="kelurahan" >Kelurahan</label>
            <select wire:model="selectedKelurahan" class="form-control">
                <option value="" selected>Pilih Kelurahan</option>
                @foreach($kelurahan as $kelurahans)
                <option value="{{ $kelurahans->id }}">{{ $kelurahans->nama_provinsi}}</option>
                @endforeach
            </select>
            {{-- @endif --}}
        </div>
    </div>
    <div class="form-group row ">
        <div class="col">
            {{-- @if (!is_null($selectedKelurahan)) --}}
            <label for="rw" >Rw</label>
                <select wire:model="selectedRw" class="form-control" name="id_rw">
                    <option value="" selected>Pilih Rw</option>
                    @foreach($rw as $rws)
                    <option value="{{ $rws->id }}">{{ $rws->nama_rw }}</option>
                    @endforeach
                </select>
                {{-- @endif --}}
            </div>
        </div>
    </div>