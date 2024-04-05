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
                        @if (Auth::user()->role == 1)
                            <a href="" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#tambah">+
                                Tambah Data</a>
                        @else
                            <button href="" type="button" class="btn btn-primary btn-sm" disabled>Info
                                Siswa</button>
                        @endif
                    </div>

                    <div class="card-body">
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NISN | NIS</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">No. HP</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswa as $no => $s)
                                    <tr>
                                        <th scope="row">{{ ++$no }}</th>
                                        <td>{{ $s->nisn }} | {{ $s->nis }}</td>
                                        <td>{{ $s->nama }}</td>
                                        <td>{{ $s->kelas->nama_kelas }}</td>
                                        <td>{{ $s->no_hp }}</td>
                                        <td>
                                            @if (Auth::user()->role == 1)
                                                <a href="" class="btn btn-secondary btn text-white"
                                                    data-bs-toggle="modal" data-bs-target="#edit{{ $s->id }}"><i
                                                        class="bi bi-pencil-square"></i></a>
                                                <a href="" class="btn btn-warning btn text-white"
                                                    data-bs-toggle="modal" data-bs-target="#detail{{ $s->id }}"><i
                                                        class="bi bi-eye"></i></a>
                                                <a href="" class="btn btn-danger btn text-white"
                                                    data-bs-toggle="modal" data-bs-target="#delete{{ $s->id }}"><i
                                                        class="bi bi-trash"></i></a>
                                            @endif
                                            <div class="dropdown mt-1">
                                                <button class="btn btn-info btn-md dropdown-toggle text-white"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-list"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('pembayaran.show', $s->id) }}">Riwayat</a></li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#bayar{{ $s->id }}">Bayar SPP</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <h3>Data Belum Ada</h3>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $siswa->links() }}
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data siswa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('siswa.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Siswa</label>
                            <input type="text"
                                class="form-control @error('nama')
                            is-invalid
                            @enderror()"
                                name="nama" placeholder="Masukkan Nama Siswa">

                            @error('nama')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="email"
                                class="form-control @error('email')
                            is-invalid
                            @enderror()"
                                name="email" placeholder="Masukkan email Siswa">

                            @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="password"
                                class="form-control @error('password')
                            is-invalid
                            @enderror()"
                                name="password" placeholder="Masukkan password Siswa">

                            @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NISN</label>
                            <input type="number"
                                class="form-control @error('nisn')
                            is-invalid
                            @enderror()"
                                name="nisn" placeholder="Masukkan NISN Siswa">

                            @error('nisn')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NIS</label>
                            <input type="number"
                                class="form-control @error('nis')
                            is-invalid
                            @enderror()"
                                name="nis" placeholder="Masukkan NIS Siswa">

                            @error('nis')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kelas</label>
                            <select
                                class="form-select @error('kelas_id')
                            is-invalid
                            @enderror()"
                                name="kelas_id" aria-label="Pilih Kelas">
                                <option selected>Open this select menu</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endforeach
                            </select>

                            @error('kelas_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea
                                class="form-control @error('alamat')
                            is-invalid
                            @enderror()"
                                name="alamat" rows="3"></textarea>

                            @error('alamat')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">No. HP</label>
                            <input type="number"
                                class="form-control @error('no_hp')
                            is-invalid
                            @enderror()"
                                name="no_hp" placeholder="Masukkan No. HP Siswa">

                            @error('no_hp')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SPP</label>
                            <select
                                class="form-select @error('spp_id')
                            is-invalid
                            @enderror()"
                                name="spp_id" aria-label="Pilih Masa Spp">
                                <option selected>Open this select menu</option>
                                @foreach ($spp as $s)
                                    <option value="{{ $s->id }}">{{ $s->tahun }}</option>
                                @endforeach
                            </select>

                            @error('spp_id')
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
    @foreach ($siswa as $s)
        <div class="modal fade" id="edit{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data Siswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('siswa.update', $s->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama Siswa</label>
                                <input type="text"
                                    class="form-control @error('nama')
                                is-invalid
                                @enderror()"
                                    value="{{ old('nama', $s->nama) }}" name="nama"
                                    placeholder="Masukkan Nama Siswa">

                                @error('nama')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email"
                                    class="form-control @error('email')
                                is-invalid
                                @enderror()"
                                    value="{{ old('email', $s->email) }}" name="email"
                                    placeholder="Masukkan email Siswa">

                                @error('email')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Password</label>
                                <input type="password"
                                    class="form-control @error('password')
                                is-invalid
                                @enderror()"
                                    value="{{ old('password', $s->password) }}" name="password"
                                    placeholder="Masukkan password Siswa">

                                @error('password')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">NISN</label>
                                <input type="number"
                                    class="form-control @error('nisn')
                                is-invalid
                                @enderror()"
                                    value="{{ old('nisn', $s->nisn) }}" name="nisn" placeholder="Masukkan NISN Siswa"
                                    readonly>

                                @error('nisn')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">NIS</label>
                                <input type="number"
                                    class="form-control @error('nis')
                                is-invalid
                                @enderror()"
                                    value="{{ old('nis', $s->nis) }}" name="nis" placeholder="Masukkan NIS Siswa"
                                    readonly>

                                @error('nis')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Kelas</label>
                                <select
                                    class="form-select @error('kelas_id')
                                is-invalid
                                @enderror()"
                                    name="kelas_id" aria-label="Pilih Kelas">
                                    <option selected>{{ $s->kelas_id }}</option>
                                    @foreach ($kelas as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                    @endforeach
                                </select>

                                @error('kelas_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea
                                    class="form-control @error('alamat')
                                is-invalid
                                @enderror()"
                                    name="alamat" rows="3">{{ $s->alamat }}</textarea>

                                @error('alamat')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">No. HP</label>
                                <input type="number"
                                    class="form-control @error('no_hp')
                                is-invalid
                                @enderror()"
                                    value="{{ old('no_hp', $s->no_hp) }}" name="no_hp"
                                    placeholder="Masukkan No. HP Siswa">

                                @error('no_hp')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">SPP</label>
                                <select
                                    class="form-select @error('spp_id')
                                is-invalid
                                @enderror()"
                                    name="spp_id" aria-label="Pilih Masa Spp">
                                    <option selected>{{ $s->spp_id }}</option>
                                    @foreach ($spp as $s)
                                        <option value="{{ $s->id }}">{{ $s->tahun }}</option>
                                    @endforeach
                                </select>

                                @error('spp_id')
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
    @endforeach
    <!-- Modal Delete -->
    @foreach ($siswa as $s)
        <div class="modal fade" id="delete{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Siswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin akan menghapus data {{ $s->nama }}</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form action="{{ route('siswa.destroy', $s->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Modal Show -->
    @foreach ($siswa as $s)
        <div class="modal fade" id="detail{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Siswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $s->nama }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">NISN | NIS</h6>
                                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $s->nisn }} |
                                    {{ $s->nis }}</h6>
                                <p class="card-text">{{ $s->kelas->nama_kelas }}</p>
                                <p class="card-text">{{ $s->no_hp }}</p>
                                <p class="card-text">{{ $s->spp->tahun }}</p>
                                <p class="card-text">{{ 'Rp. ' . number_format($s->spp->nominal, 2, ',', '.') }}</p>
                                <p class="card-text">{{ $s->alamat }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- Modal Bayar -->
    @foreach ($siswa as $s)
        <div class="modal fade" id="bayar{{ $s->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Bayar SPP Siswa</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pembayaran.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <input type="text"
                                    class="form-control @error('nama')
                                is-invalid
                                @enderror()"
                                    value="{{ old('nama', $s->nama) }}" name="nama" placeholder="Masukkan Nama Siswa"
                                    readonly>
                            </div>
                            <div class="mb-3">
                                <input type="text"
                                    class="form-control @error('siswa_id')
                                is-invalid
                                @enderror()"
                                    value="{{ old('siswa_id', $s->id) }}" name="siswa_id" placeholder="Masukkan Siswa"
                                    hidden>

                                @error('siswa_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tanggal Bayar</label>
                                <input type="date"
                                    class="form-control @error('tanggal_bayar')
                                is-invalid
                                @enderror()"
                                    value="{{ old('tanggal_bayar', $s->tanggal_bayar) }}" name="tanggal_bayar"
                                    placeholder="Masukkan tanggal_bayar">

                                @error('tanggal_bayar')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Bulan</label>
                                <select
                                    class="form-select @error('bulan')
                                is-invalid
                                @enderror()"
                                    name="bulan" aria-label="Pilih Bulan">
                                    <option selected>Masukkan Bulan Pembayaran</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                </select>

                                @error('bulan')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">SPP</label>
                                <select
                                    class="form-select @error('spp_id')
                                is-invalid
                                @enderror()"
                                    name="spp_id" aria-label="Pilih Masa Spp">
                                    <option selected>Yang harus dibayarkan</option>
                                    @foreach ($spp as $s)
                                        <option value="{{ $s->id }}">{{ $s->nominal }}</option>
                                    @endforeach
                                </select>

                                @error('spp_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total Bayar</label>
                                <input type="number"
                                    class="form-control @error('total_bayar')
                                is-invalid
                                @enderror()"
                                    value="{{ old('total_bayar', $s->total_bayar) }}" name="total_bayar"
                                    placeholder="Masukkan total_bayar">

                                @error('spp_id')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Administrator</label>
                                <input type="text"
                                    class="form-control @error('nama_penginput')
                                is-invalid
                                @enderror()"
                                    name="nama_penginput" value="{{ Auth::user()->name }}"
                                    placeholder="Masukkan nama_penginput" readonly>

                                @error('nama_penginput')
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
    @endforeach
@endpush
