@extends('layouts.app')

@section('title')
    Tambah KRS
@endSection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('krs.index') }}" class="btn btn-danger">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('krs.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Daftar Mata Kuliah</label>
                    <table class="table table-vcenter">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Mata Kuliah</th>
                                <th>Banyak SKS</th>
                                <th>Dosen Pengampu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sks as $item)
                                <tr>
                                    <td><input type="checkbox" name="mata_kuliah[]" value="{{ $item->id }}"></td>
                                    <td>{{ $item->mata_kuliah }}</td>
                                    <td>{{ $item->banyak_sks }}</td>
                                    <td>{{ $item->dosen->gelar_depan }} {{ $item->dosen->nama }} {{ $item->dosen->gelar_belakang }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">Tidak ada data mata kuliah</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Submit
                </button>
                <div class="modal" id="exampleModal" tabindex="-1">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Konfirmasi Submit SKS</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Setelah Kamu Submit tidak akan bisa menambah SKS lagi, Apakah kamu yakin?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Tidak</button>
                          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Ya</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </form>
        </div>
    </div>
@endSection