<?php

namespace App\Http\Livewire;

use App\Models\Rw;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Prakerin;
use Livewire\Component;
class Tracking extends Component
{
        public $provinsi;
        public $kota;
        public $kecamatan;
        public $kelurahan;
        public $rw;
    
        public $selectedProvinsi = null;
        public $selectedKota = null;
        public $selectedKecamatan = null;
        public $selectedKelurahan = null;
        public $selectedRw = null;
    
        public function mount($selectedRw = null)
        {
            $this->provinsi = Provinsi::all();
            $this->selectedRw = $selectedRw;
            $this->kota = Kota::whereHas('provinsi',function ($query) {
                $query->whereId(request()->input('id_provinsi', 0));
            })->pluck('nama_kota', 'id');
            $this->kecamatan = Kecamatan::whereHas('kota', function ($query) {
                $query->whereId(request()->input('id_kota', 0));
            })->pluck('nama_kecamatan', 'id');
            $this->kelurahan = Kelurahan::whereHas('kecamatan', function ($query) {
                $query->whereId(request()->input('id_kecamatan', 0));
            })->pluck('nama_provinsi', 'id');
            $this->rw = Rw::whereHas('kelurahan', function ($query) {
                $query->whereId(request()->input('id_kelurahan', 0));
            })->pluck('nama_rw', 'id');
            $this->selectedRw = $selectedRw;
    
            if (!is_null($selectedRw)) {
                $rw = Rw::with('kelurahan.kecamatan.kota.provinsi')->find($selectedRw);
                if ($rw) {
                    $this->rw = Rw::where('id_kelurahan', $rw->id_kelurahan)->get();
                    $this->kelurahan = Kelurahan::where('id_kecamatan', $rw->kelurahan->id_kecamatan)->get();
                    $this->kecamatan = Kecamatan::where('id_kota', $rw->kelurahan->kecamatan->id_kota)->get();
                    $this->kota = Kota::where('id_provinsi', $rw->kelurahan->kecamatan->kota->id_provinsi)->get();
                    $this->selectedProvinsi =$rw->kelurahan->kecamatan->kota->id_provinsi;
                    $this->selectedKota = $rw->kelurahan->kecamatan->id_kota;
                    $this->selectedKecamatan = $rw->kelurahan->id_kecamatan;
                    $this->selectedKelurahan = $rw->id_kelurahan;
                }
            }
        }
    public function render()
    {
        return view('livewire.tracking');
    }

   
    public function updatedSelectedProvinsi($provinsi)
    {
        $this->kota = Kota::where('id_provinsi', $provinsi)->get();
        $this->selectedKota = NULL;
        $this->selectedKecamatan = NULL;
        $this->selectedKelurahan = NULL;
        $this->selectedRw = NULL;
    }
    public function updatedSelectedKota($kota)
    {
        $this->kecamatan = Kecamatan::where('id_kota', $kota)->get();
        $this->selectedKecamatan = NULL;
        $this->selectedKelurahan = NULL;
        $this->selectedRw = NULL;

    }

    public function updatedSelectedKecamatan($kecamatan)
    {
        $this->kelurahan = Kelurahan::where('id_kecamatan', $kecamatan)->get();
        $this->selectedKelurahan = NULL;
        $this->selectedRw = NULL;
    }
    public function updatedSelectedKelurahan($kelurahan)
    {
        if (!is_null($kelurahan)) {
            $this->rw = Rw::where('id_kelurahan', $kelurahan)->get();
        }else{
            $this->selectedRw = NULL;
        }
    }
}
