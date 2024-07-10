@extends('layouts.app')

@section('title')
    Tambah Penilaian
@endSection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <a href="{{ route('penilaian.index') }}" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <div class="col">
                @foreach ($mahasiswa as $item)
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>: {{ $item->mahasiswa->nama }}</td>
                        </tr>
                        <tr>
                            <td>NIM</td>
                            <td>: {{ $item->mahasiswa->nim }}</td>
                        </tr>
                        <tr>
                            <td>Prodi</td>
                            <td>: {{ $item->mahasiswa->prodi->nama }}</td>
                        </tr>
                    </table>
                @endforeach
            </div>
        </div>
        <div class="card-footer d-flex justify-content-center">
            <div class="">
                {{ $mahasiswa->links() }}
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('penilaian.store', $id) }}" method="POST">
                @csrf

                <div class="table-responsive mb-3">
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th>Nilai Presensi</th>
                                <th>Nilai Tugas</th>
                                <th>Nilai UTS</th>
                                <th>Nilai UAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mahasiswa as $item)
                                <tr>
                                    <td><input type="number" name="nilai_presensi" class="form-control" min="0" max="100"
                                            value="{{ $item->nilai_absen }}"></td>
                                    <td><input type="number" name="nilai_tugas" class="form-control" min="0" max="100"
                                            value="{{ $item->nilai_tugas }}"></td>
                                    <td><input type="number" name="nilai_uts" class="form-control" min="0" max="100"
                                            value="{{ $item->nilai_uts }}"></td>
                                    <td><input type="number" name="nilai_uas" class="form-control" min="0" max="100"
                                            value="{{ $item->nilai_uas }}"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endSection
