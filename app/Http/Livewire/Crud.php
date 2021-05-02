<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Produk;

class Crud extends Component
{
    public $produk, $title, $description, $cover;
    public $isModalOpen = 0;

    public function index()
    {
        $title="Daftar Produk";
        $produk = Produk::all();
        return view('admin.produk', compact('title'));
    }

    public function create()
    {
        $title="Tambah Produk";
        return view('admin.input',compact('title'));
        
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
        $this->title = '';
        $this->description = '';
        $this->cover = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'cover' => 'required',
        ]);
    
        Produk::updateOrCreate(['id' => $this->id], [
            'title' => $this->title,
            'description' => $this->description,
            'cover' => $this->cover,
        ]);

        session()->flash('message', $this->id ? 'Produk updated.' : 'Produk created.');

        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $this->id = $id;
        $this->title = $produk->title;
        $this->description = $produk->description;
        $this->cover = $produk->cover;
    
        $this->openModalPopover();
    }
    
    public function delete($id)
    {
        Produk::find($id)->delete();
        session()->flash('message', 'Produk berhasil dihapus.');
    }
}
