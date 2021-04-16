<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){ // Pemilihan jika ingin melakukan pencarian nama
            $mahasiswas = Mahasiswa::where('Nama', 'like', "%".$request->search."%")->paginate(5);
        } else { // Pemilihan jika tidak melakukan pencarian nama
            //fungsi eloquent menampilkan data menggunakan pagination
            $mahasiswas = Mahasiswa::with('kelas')->get();
            $mahasiswas = Mahasiswa::paginate(5); // Pagination menampilkan 5 data
        }
        return view('users.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('users.create',['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Tanggal_Lahir' => 'required',
            'kelas' => 'required',
            'Jurusan' => 'required',
            'Email' => 'required',
            'No_Handphone' => 'required',
        ]);

        $kelas = Kelas::find($request->get('kelas'));

        $Mahasiswa = new Mahasiswa;
        $Mahasiswa->Nim = $request->get('Nim');
        $Mahasiswa->Nama = $request->get('Nama');
        $Mahasiswa->Tanggal_Lahir = $request->get('Tanggal_Lahir');
        $Mahasiswa->Jurusan = $request->get('Jurusan');
        $Mahasiswa->Email = $request->get('Email');
        $Mahasiswa->No_Handphone = $request->get('No_Handphone');

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $Mahasiswa->kelas()->associate($kelas);
        $Mahasiswa->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
        ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($Nim)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        //code sebelum dibuat relasi --> $Mahasiswa = Mahasiswa::find($Nim);
        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();

        return view('users.detail', compact('Mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
        $kelas = Kelas::all(); //mendapatkan nilai dari tabel kelas
        return view('users.edit', compact('Mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Nim)
    {
        //melakukan validasi data
        $request->validate([
            'Nim' => 'required',
            'Nama' => 'required',
            'Tanggal_Lahir' => 'required',
            'kelas' => 'required',
            'Jurusan' => 'required',
            'Email' => 'required',
            'No_Handphone' => 'required',
        ]);

        $Mahasiswa = Mahasiswa::with('kelas')->where('Nim', $Nim)->first();
        $Mahasiswa->Nim = $request->get('Nim');
        $Mahasiswa->Nama = $request->get('Nama');
        $Mahasiswa->Tanggal_Lahir = $request->get('Tanggal_Lahir');
        $Mahasiswa->Jurusan = $request->get('Jurusan');
        $Mahasiswa->Email = $request->get('Email');
        $Mahasiswa->No_Handphone = $request->get('No_Handphone');

        $kelas = Kelas::find($request->get('kelas'));

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $Mahasiswa->kelas()->associate($kelas);
        $Mahasiswa->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($Nim)
    {
        //fungsi eloquent untuk menghapus data
        Mahasiswa::find($Nim)->delete();
        return redirect()->route('mahasiswa.index')
        -> with('success', 'Mahasiswa Berhasil Dihapus');
    }
    public function nilai($Nim)
    {
        $Mahasiswa = Mahasiswa::with('kelas', 'matakuliah')->find($Nim);
        return view('users.nilai', compact('Mahasiswa'));
    }
}
