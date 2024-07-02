<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use Illuminate\Http\Request;

class EskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eskul = Eskul::all();
        return view('eskul.index')->with('eskul', $eskul);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eskul.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'kode_eskul'=> 'required|max:10',
            'nama'=> 'required|max:45',
            'pelatih'=> 'required|max:45',
            'tanggal_resmi'=> 'required'
        ]);

        Eskul::create($val);
        return redirect()->route('eskul.index')->with('success',$val['nama'].' Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Eskul $eskul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($eskul)
    {
        $eskul = Eskul::find($eskul);
        return view('eskul.edit')->with('eskul', $eskul);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $eskul)
    {
        $val = $request->validate([
            'kode_eskul'=> 'required|max:3',
            'nama'=> 'required|max:45',
            'pelatih'=> 'required|max:45',
            'tanggal_resmi'=> 'required'
        ]);
        
        $eskul = Eskul::find($eskul);
        Eskul::where('id', $eskul['id'])->update($val);
        return redirect()->route('eskul.index')->with('success',$val['nama'].' Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($eskul)
    {
        $eskul = Eskul::find($eskul);
        $eskul->delete();
        return redirect()->route('eskul.index')->with('success','Eskul Berhasil di Hapus!');
    }
}
