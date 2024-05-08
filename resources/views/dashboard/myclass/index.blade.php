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
                                    <div class="col-lg-10">
                                        <h4>Kelas Management</h4>
                                    </div>
                                    <div class="col-lg-2 text-right">
                                        <a class="btn btn-success text-white" href="{{ route('kelas.create') }}">Buat Kelas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Waktu Pelaksanaan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kelas as $kelas)
                                @if($kelas->status == 'Aktif')
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kelas->judul }}</td>
                                    <td>{{ \Carbon\Carbon::parse($kelas->pelaksanaan)->format('d M Y') }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{ route('myclass.show', $kelas->id) }}">Detail</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- {!! $data->render() !!} --}}
@endsection
