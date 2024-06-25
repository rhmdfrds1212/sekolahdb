<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('siswa.index')->with('siswa', $siswa);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        $eskul = Eskul::all();
        $guru = Guru::all();
        return view('siswa.create')->with('jurusan', $jurusan)->with('kelas', $kelas)->with('guru', $guru)->with('eskul', $eskul);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $val = $request->validate([
            'url_siswa'=> 'required|file|mimes:png,jpg|max:5000',
            'nisn'=> 'required|max:16',
            'nama'=> 'required|max:45',
            'jenis_kelamin'=> 'required|max:45',
            'alamat'=> 'required|max:45',
            'jurusan_id'=> 'required',
            'kelas_id'=> 'required',
            'guru_id'=> 'required',
            'eskul_id'=> 'required',
            'tempat_lahir'=> 'required|max:45',
            'tanggal_lahir'=> 'required'
        ]);

        //extensi file yang di upload
        $ext = $request->url_siswa->getClientOriginalExtension();
        //rename misal: nisn.extensi 123456789.png
        $val['url_siswa'] = $request->nisn.".".$ext;
        //upload ke dalam folder public/fotosiswa/
        $request->url_siswa->move('fotosiswa/', $val['url_siswa']);

        Siswa::create($val);
        return redirect()->route('siswa.index')->with('success',$val['nama'].' Berhasil di Simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($siswa)
    {
        $siswa = Siswa::find($siswa);
        $jurusan = Jurusan::all();
        $kelas = Kelas::all();
        $eskul = Eskul::all();
        $guru = Guru::all();
        return view('siswa.edit')->with('jurusan', $jurusan)->with('kelas', $kelas)->with('eskul', $eskul)->with('guru', $guru)->with('siswa', $siswa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$siswa)
    {
        if ($request->url_siswa){
            $val = $request->validate([
                'url_siswa'=> 'required|file|mimes:png,jpg|max:5000',
                'nisn'=> 'required|max:16',
                'nama'=> 'required|max:45',
                'jenis_kelamin'=> 'required|max:45',
                'alamat'=> 'required|max:45',
                'jurusan_id'=> 'required',
                'kelas_id'=> 'required',
                'guru_id'=> 'required',
                'eskul_id'=> 'required',
                'tempat_lahir'=> 'required|max:45',
                'tanggal_lahir'=> 'required'
            ]);
            //extensi file yang di upload
            $ext = $request->url_siswa->getClientOriginalExtension();
            //rename misal: nisn.extensi 123456789.png
            $val['url_siswa'] = $request->nisn.".".$ext;
            //upload ke dalam folder public/fotosiswa/
            $request->url_siswa->move('fotosiswa/', $val['url_siswa']);
        }else{
            $val = $request->validate([
                //'url_siswa'=> 'required|file|mimes:png,jpg|max:5000',
                'nisn'=> 'required|max:16',
                'nama'=> 'required|max:45',
                'jenis_kelamin'=> 'required|max:45',
                'alamat'=> 'required|max:45',
                'jurusan_id'=> 'required',
                'kelas_id'=> 'required',
                'guru_id'=> 'required',
                'eskul_id'=> 'required',
                'tempat_lahir'=> 'required|max:45',
                'tanggal_lahir'=> 'required'
            ]);
            $siswa = Siswa::find($siswa);
            Siswa::where('id', $siswa['id'])->update($val);
            return redirect()->route('siswa.index')->with('success',$val['nama'].' Berhasil di Edit');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($siswa)
    {
        $siswa = Siswa::find($siswa);
        File::delete('fotosiswa/'.$siswa['url_siswa']);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success',' Data Berhasil di Hapus');
    }
}
