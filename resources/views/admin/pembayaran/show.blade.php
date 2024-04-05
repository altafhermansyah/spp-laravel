@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <marquee behavior="left" direction="left">Data Rekap Pembayaran Spp Per Siswa</marquee>
                    </div>

                    <div class="card-body">
                        <table class="table table-responsive table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Siswa</th>
                                    <th scope="col">Tanggal Bayar</th>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Tahun | Nominal</th>
                                    <th scope="col">Jumlah Bayar</th>
                                    <th scope="col">Hutang</th>
                                    <th scope="col">Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pembayaran as $no => $p)
                                    <tr>
                                        <th scope="row">{{ ++$no }}</th>
                                        <td>{{ $p->siswa->nama }}</td>
                                        <td>{{ $p->tanggal_bayar }}</td>
                                        <td>{{ $p->bulan }}</td>
                                        <td>{{ $p->spp->tahun }} |
                                            {{ 'Rp. ' . number_format($p->spp->nominal, 2, ',', '.') }}</td>
                                        <td>{{ 'Rp. ' . number_format($p->total_bayar, 2, ',', '.') }}</td>
                                        <td><button
                                                class="btn btn-outline-success btn-sm">{{ 'Rp. ' . number_format($p->spp->nominal - $p->total_bayar, 2, ',', '.') }}</button>
                                        </td>
                                        <td>{{ $p->nama_penginput }}</td>
                                    </tr>
                                @empty
                                    <h3>Data Belum Ada</h3>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $pembayaran->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
