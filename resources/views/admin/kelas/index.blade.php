@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($message = Session::get('update'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($message = Session::get('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah">+
                            Tambah Data</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Kelas</th>
                                    <th scope="col">Kompetensi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($kelas as $no => $k)
                                    <tr>
                                        <th scope="row">{{ ++$no }}</th>
                                        <td>{{ $k->nama_kelas }}</td>
                                        <td>{{ $k->kompetensi_keahlian }}</td>
                                        <td>
                                            <a href="" class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $k->id }}">Edit</a>
                                            <a href="" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $k->id }}">Hapus</a>
                                        </td>
                                    </tr>
                                @empty
                                    <h3>Data Belum Ada</h3>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $kelas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modal')
    <!-- Modal -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kelas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kelas.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Kelas</label>
                            <input type="text"
                                class="form-control @error('nama_kelas')
                            is-invalid
                            @enderror()"
                                name="nama_kelas" placeholder="Masukkan Nama Kelas">

                            @error('nama_kelas')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kompetensi</label>
                            <input type="text"
                                class="form-control @error('kompetensi')
                            is-invalid
                            @enderror()"
                                name="kompetensi" placeholder="Masukkan Kompetensi">

                            @error('kompetensi')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
    @foreach ($kelas as $k)
        <div class="modal fade" id="edit{{ $k->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data Kelas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kelas.update', $k->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Kelas</label>
                                <input type="text"
                                    class="form-control @error('nama_kelas')
                            is-invalid
                            @enderror()"
                                    name="nama_kelas" placeholder="Masukkan Nama Kelas"
                                    value="{{ old('nama_kelas', $k->nama_kelas) }}">

                                @error('nama_kelas')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kompetensi</label>
                                <input type="text"
                                    class="form-control @error('kompetensi')
                            is-invalid
                            @enderror()"
                                    name="kompetensi" placeholder="Masukkan Kompetensi"
                                    value="{{ old('kompetensi_keahlian', $k->kompetensi_keahlian) }}">

                                @error('kompetensi')
                                    <div class="alert
                                    alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Modal Delete -->
    @foreach ($kelas as $k)
        <div class="modal fade" id="delete{{ $k->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Kelas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin akan menghapus data {{ $k->nama_kelas }}</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('kelas.destroy', $k->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endpush
