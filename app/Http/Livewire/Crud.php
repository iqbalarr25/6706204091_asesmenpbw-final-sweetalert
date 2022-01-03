<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Komik;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use File;

class Crud extends Component    
{
    use WithFileUploads;    
    public $komiks, $isbn, $judul, $penulis, $penerbit, $tahun_terbit,$harga,$image,$temp_image, $komik_id;
    public $isModalOpen = false;
    public $isModalOpenShow = false;
    public $edit = false;

    public function render()
    {
        $this->komiks = Komik::all();
        return view('livewire.crud');
    }
    public function create()
    {
        $this->resetCreateForm();
        $this->openModal();
    }
    public function openModal()
    {
        $this->isModalOpen = true;
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
        $this->edit=false;
    }
    public function openModalShow()
    {
        $this->isModalOpenShow = true;
    }
    public function closeModalShow()
    {
        $this->isModalOpenShow = false;
    }
    private function resetCreateForm(){
        $this->komik_id = '';
        $this->isbn = '';
        $this->judul = '';
        $this->penulis = '';
        $this->penerbit = '';
        $this->tahun_terbit = '';
        $this->harga = '';
        $this->image = '';
        $this->temp_image = '';
    }
    public function store()
    {
        $this->validate([
            'isbn' => ['required', 'string', 'max:64',"unique:komik,isbn,$this->komik_id"],
            'judul' => ['required', 'string', 'max:100'],
            'penulis' => ['required', 'string', 'max:100'],
            'penerbit' =>['required', 'string', 'max:100'],
            'tahun_terbit' => ['required', 'integer'],
            'harga' => ['required', 'integer'],
            'image' => ['required'],
        ]);
        if($this->edit==true){
            $komik = Komik::findOrFail($this->komik_id);
            unlink(public_path().'/komik/'.$komik->image);
            $this->edit=false;
        }
        $resume = time() . '.' . $this->image->getClientOriginalExtension();
        $this->image->storeAs('public/images/', $resume);
        Komik::updateOrCreate(['id' => $this->komik_id], [
            'isbn' => $this->isbn,
            'judul' => $this->judul,
            'penulis' => $this->penulis,
            'penerbit' => $this->penerbit,
            'tahun_terbit' => $this->tahun_terbit,
            'harga' => $this->harga,
            'image' => $resume,
        ]);
        session()->flash('message', $this->komik_id ? 'Data updated successfully.' : 'Data added successfully.');
        $this->edit=false;
        $this->closeModal();
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $komik = Komik::findOrFail($id);
        $this->komik_id = $id;
        $this->isbn = $komik->isbn;
        $this->judul = $komik->judul;
        $this->penulis = $komik->penulis;
        $this->penerbit = $komik->penerbit;
        $this->tahun_terbit = $komik->tahun_terbit;
        $this->harga = $komik->harga;
        $this->image = $komik->image;
        $this->temp_image = $this->image;
        $this->edit = true;
        $this->openModal();
    }
    public function show($id)
    {
        $komik = Komik::findOrFail($id);
        $this->komik_id = $id;
        $this->isbn = $komik->isbn;
        $this->judul = $komik->judul;
        $this->penulis = $komik->penulis;
        $this->penerbit = $komik->penerbit;
        $this->tahun_terbit = $komik->tahun_terbit;
        $this->harga = $komik->harga;
        $this->image = $komik->image;
        $this->openModalShow();
    }
    public function delete($id)
    {   
        $komik = Komik::findOrFail($id);
        unlink(public_path().'/komik/'.$komik->image);
        Komik::find($id)->delete();
        session()->flash('message', 'Data deleted successfully.');
    }
}
