@extends('layouts.app')

@section('title')
    Dosen
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="text-end w-100">
                <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Dosen</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-vcenter">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($dosen as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->nidn }}</td>
                                <td>{{ $item->gelar_depan }} {{ $item->nama }} {{ $item->gelar_belakang }}</td>
                                <td>{{ $item->email }}</td>
                                <td class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('dosen.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('dosen.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data dosen</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $dosen->links() }}
    </div>
@endSection
