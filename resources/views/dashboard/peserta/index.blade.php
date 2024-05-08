@extends('dashboard.main')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="card shadow-lg">
                <div class="card-body">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h4>Peserta Management</h4>
                                    </div>
                                    <div class="col-lg-4">
                                        <a class="btn btn-success text-white" href="{{ route('peserta.create') }}">Create</a>
                                        <a class="btn btn-warning text-white ml-2" href="{{ route('peserta.cetak') }}"><i class="bi bi-printer"> </i>Cetak</a> <!-- Tambah tombol cetak -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Judul</th>
                                <th width="300px">Action</th>
                            </tr>
                            @foreach ($pesertas as $peserta)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $peserta->nama_peserta }}</td>
                                    <td>{{ $peserta->judul }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('peserta.show', $peserta->id) }}">Show</a>
                                        <a class="btn btn-primary" href="{{ route('peserta.edit', $peserta->id) }}">Edit</a>
                                        <form action="{{ route('peserta.destroy', $peserta->id) }}" method="POST"
                                            onclick="return confirm('Yakin Untuk Menghapus Data ?')" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- {!! $pesertas->render() !!} --}}
@endsection
