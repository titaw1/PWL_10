@extends('users.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2" align="center">
                <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
                <br><br>
                <h1>KARTU HASIL STUDI (KHS)</h1>
            </div>
            <br><br>
            <div class="float-left my-2">
                <p><strong>Nama :</strong> {{ $Mahasiswa->Nama }}</p>
                <p><strong>NIM :</strong> {{ $Mahasiswa->Nim }}</p>
                <p><strong>Kelas :</strong> {{ $Mahasiswa->kelas->nama_kelas }}</p>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Semester</th>
            <th>Nilai</th>
        </tr>
        @foreach ($Mahasiswa->matakuliah as $matkul)
        <tr>
            <td>{{ $matkul->nama_matkul }}</td>
            <td>{{ $matkul->sks }}</td>
            <td>{{ $matkul->semester }}</td>
            <td>{{ $matkul->pivot->nilai }}</td>
        </tr>
        @endforeach
    </table>

    <div class="float-right my-2">
        <a class="btn btn-success mt-3" href="{{ route('mahasiswa.index') }}">Kembali</a>
    </div>

@endsection
