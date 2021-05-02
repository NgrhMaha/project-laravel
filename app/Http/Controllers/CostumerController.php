<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costumer=Costumer::all();
        $judul="Costumer";
        return view('admin.costumer',compact('judul','costumer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul="Tambah Costumer";
        return view('admin.inputcos',compact('judul'));
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
            'date'    =>'Kolom :artibut harus tanggal',
            'numeric' =>'Kolom :atribut harus angka'
        ];
        $validasi=$request->validate([
                'nama'=>'required|max:255',
                'alamat'=>'required',
                'nohp'=>'required'
        ],$message);
      ;
        $validasi['user_id']=Auth::id();
        Costumer::create($validasi);
        return redirect('costumer');
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
        $costumer=Costumer::find($id);
        $judul="Edit Costumer";
        return view('admin.inputcos',compact('judul','costumer'));
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
            'date'    =>'Kolom :artibut harus tanggal',
            'numeric' =>'Kolom :atribut harus angka',
        ];
        $validasi=$request->validate([
                'nama'=>'max:255',
                'alamat'=>'',
                'nohp'=>''
        ],$message);
   
        $validasi['user_id']=Auth::id();
        $produk=Costumer::find($id);
       
        Costumer::where('id',$id)->update($validasi);
        return redirect('costumer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $costumer=Costumer::find($id);
        if($costumer != null){
            $costumer=Costumer::find($costumer->id);
            Costumer::where('id',$id)->delete();
        }

        return redirect('costumer')->with('success','Data Berhasil Terhapus');
    }
    
}
