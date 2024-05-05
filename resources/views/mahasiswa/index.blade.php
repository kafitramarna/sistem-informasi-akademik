@extends('layouts.app')

@section('title')
    Mahasiswa
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Mahasiswa</h3>
            <div class="text-end w-100">
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mahasiswa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nim }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->prodi->nama }}</td>
                                <td class="d-flex justify-content-end gap-2"><a
                                        href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $mahasiswa->links() }}
    </div>
@endSection
