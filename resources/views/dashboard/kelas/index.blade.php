@extends('dashboard.main')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="card mb-0 ">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col">
                            <h5 class="card-title fw-semibold mb-4 d-inline">Data kelas</h5>
                        </div>
                        <div class="col d-flex justify-content-end">
                            @if (Auth::user()->id_role == 1)
                            <a href="{{ route('kelas.create') }}" class="btn btn-sm btn-primary"><i class="bi bi-plus"></i>
                                Tambah</a>
                            @endif
                            
                            
                        </div>
                    </div>
                    <table class="table table-striped" style="width:100%" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Pelaksanaan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelas as $key => $kelas)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kelas->judul }}</td>
                                    <td>{{ \Carbon\Carbon::parse($kelas->pelaksanaan)->format('d M Y') }}</td>
                                    <td>{{ $kelas->status }}</td>
                                    <td>
                                        @if (Auth::user()->id_role == 1)
                                        <a class="btn btn-sm btn-info" href="{{ route('kelas.show', $kelas->id) }}">Show</a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('kelas.edit', $kelas->id) }}">Edit</a>
                                    
                                        <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST" onsubmit="return confirm('Yakin Untuk Menghapus Data ?')" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                        @else
                                        <a class="btn btn-sm btn-primary" href="#">Join</a>
                                            
                                        @endif
                                       
                                    </td>                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
