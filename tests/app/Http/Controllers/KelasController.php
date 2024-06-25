<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('kelas.index')
                ->with('kelas', $kelas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('kelas.create')->with('jurusan', $jurusan);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'jurusan_id'=> 'required',
            'no'=> 'required|max:2',
            'nama'=> 'required|max:45',
            'wali'=> 'required|max:45',
            'jumlah'=> 'required|max:45',
            'motto'=> 'required|max:45'
        ]);

        Kelas::create($val);
        return redirect()->route('kelas.index')->with('success',$val['nama'].' Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kelas)
    {
        $kelas = Kelas::find($kelas);
        $jurusan = Jurusan::all();
        return view('kelas.edit')->with('jurusan', $jurusan)->with('kelas', $kelas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$kelas)
    {
        $val = $request->validate([
            'jurusan_id'=> 'required',
            'no'=> 'required|max:2',
            'nama'=> 'required|max:45',
            'wali'=> 'required|max:45',
            'jumlah'=> 'required|max:45',
            'motto'=> 'required|max:45'
        ]);

        $kelas = Kelas::find($kelas);
        Kelas::where('id', $kelas['id'])->update($val);
        return redirect()->route('kelas.index')->with('success', $val['nama'].' Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kelas)
    {
        $kelas = Kelas::find($kelas);
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success','Kelas Berhasil di Hapus');
    }
}
