<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $produk=Produk::all();
      $title="Daftar Produk";
      return view('admin.produk',compact('title','produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Tambah Produk";
        return view('admin.input',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required'=>'Kolom :atribut harus lengkap',
            'date'    =>'Kolom :artibut harus tangga;',
            'numeric' =>'Kolom :atribut harus angka',
        ];
        $validasi=$request->validate([
                'title'=>'required|unique:produks|max:255',
                'description'=>'required',
                'cover'=>'required|mimes:jpg,bmp,png|max:512'
        ],$message);
        $path = $request->file('cover')->store('covers');
        $validasi['user_id']=Auth::id();
        $validasi['cover']=$path;
        Produk::create($validasi);
        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $produk=Produk::find($id);
      $title="Edit Produk";
      return view('admin.input',compact('title','produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $message=[
            'required'=>'Kolom :atribut harus lengkap',
            'date'    =>'Kolom :artibut harus tangga;',
            'numeric' =>'Kolom :atribut harus angka',
        ];
        $validasi=$request->validate([
                'title'=>'required|unique:produks|max:255',
                'description'=>'required',
        ],$message);
        if($request->hasFile('cover')){
            $fileName=time().$request->file('cover')->getClientOriginalName();
            $path = $request->file('cover')->storeAs('covers',$fileName);
            $validasi['cover']=$path;
        }
        $validasi['user_id']=Auth::id();
        $produk=Produk::find($id);
        Storage::delete($produk->cover);
       
        Produk::where('id',$id)->update($validasi);
        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk=Produk::find($id);
        if($produk != null){
            Storage::delete($produk->cover);
            $produk=Produk::find($produk->id);
            Produk::where('id',$id)->delete();
        }

        return redirect('produk')->with('success','Data Berhasil Terhapus');
    }
}
