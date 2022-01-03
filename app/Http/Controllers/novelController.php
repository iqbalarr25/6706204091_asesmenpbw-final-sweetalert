<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use App\Models\Novel;
use Illuminate\Http\Request;
use PDF;
use Alert;

class novelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novel = Novel::all();
        return view('novel.index', ['novels' => $novel]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi input data employee
        $request->validate([
            'isbn' => ['required', 'string', 'max:64','unique:Novel'],
            'judul' => ['required', 'string', 'max:100'],
            'penulis' => ['required', 'string', 'max:100'],
            'penerbit' =>['required', 'string', 'max:100'],
            'tahun_terbit' => ['required', 'integer'],
            'harga' => ['required', 'integer'],
            'image' => ['required'],
            
        ]);
        $resume = time() . '.' . $request['image']->getClientOriginalExtension();
        $request['image']->move(base_path() . '/public/images/', $resume);
        Novel::create(array_merge($request->all(), ['image' => $resume]));

        Alert::success('Selamat', 'Data berhasil diinput');
        /// redirect jika sukses menyimpan data
        return redirect()->route('novel.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function show(Novel $novel)
    {
        return view('novel.show',compact('novel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function edit(Novel $novel)
    {
        return view('novel.edit',compact('novel'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Novel $novel)
    {
        $id = $novel->id;
        $request->validate([
            'isbn' => ['required','string', 'max:64',"unique:novel,isbn,$id"],
            'judul' => ['required', 'string', 'max:100'],
            'penulis' => ['required', 'string', 'max:100'],
            'penerbit' =>['required', 'string', 'max:100'],
            'tahun_terbit' => ['required', 'integer'],
            'harga' => ['required', 'integer'],
            'tahun_terbit' => ['required', 'integer'],
        ]);

        $resume = time() . '.' . $request['image']->getClientOriginalExtension();
        $request['image']->move(base_path() . '/public/images/', $resume);
        unlink(public_path().'/images/'.$novel->image);

        $novel->update(array_merge($request->all(), ['image' => $resume]));

        Alert::success('Selamat', 'Data berhasil diubah');
        return redirect()->route('novel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Novel  $novel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Novel $novel)
    {
        $novel->delete();
        unlink(public_path().'/images/'.$novel->image);
        Alert::success('Selamat', 'Data berhasil dihapus');
        return redirect()->route('novel.index');

    }
    public function exportPDF() {
        $novel = Novel::all();
        $pdf = PDF::loadView('novel.printpdf', ['novels' => $novel])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('novel.pdf');
    }
}
