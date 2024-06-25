<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('jurusan.index')
                ->with('jurusan', $jurusan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'singkatan'=> 'required|max:3',
            'nama'=> 'required|max:45',
            'pimpinan'=> 'required|max:45',
            'deskripsi'=> 'required|max:45'
        ]);

        Jurusan::create($val);
        return redirect()->route('jurusan.index')->with('success',$val['nama'].' Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        return view('jurusan.edit')->with('jurusan', $jurusan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $val = $request->validate([
            'singkatan'=> 'required|max:3',
            'nama'=> 'required|max:45',
            'pimpinan'=> 'required|max:45',
            'deskripsi'=> 'required|max:45'
        ]);

        Jurusan::where('id', $jurusan['id'])->update($val);
        return redirect()->route('jurusan.index')->with('success',$val['nama'].' Berhasil di Edit');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($jurusan)
    {
        $jurusan = Jurusan::find($jurusan);
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success','Jurusan Berhasil di Hapus!');
    }
}
