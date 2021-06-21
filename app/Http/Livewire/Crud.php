<?php

namespace App\Http\Livewire;

use App\Models\Costumer;
use Livewire\Component;
use App\Models\Produk;

class Crud extends Component
{
    public $costumers, $nama, $alamat, $nohp;
    public $isModalOpen = 0;

    public function render()
    {
        $this->costumers = Costumer::all();
        return view('livewire.crud');
    }

    public function create()
    {        
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->id = '';
        $this->nama = '';
        $this->alamat = '';
        $this->nohp = '';
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
        ]);
    
        Costumer::updateOrCreate(['id' => $this-> id], [
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'nohp' => $this->nohp,
        ]);

        session()->flash('message', $this->id ? 'Costumer updated.' : 'Costumer created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $costumer = Costumer::findOrFail($id);
        $this->id = $id;
        $this->nama = $costumer->nama;
        $this->alamat = $costumer->alamat;
        $this->nohp = $costumer->nohp;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Costumer::find($id)->delete();
        session()->flash('message', 'Produk berhasil dihapus.');
    }
}
