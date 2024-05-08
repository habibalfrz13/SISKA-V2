@extends('dashboard.main')

@section('content')
<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
        @foreach ($kelas as $kelas)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ url('images/galerikelas/'.$kelas->foto) }}" class="card-img-top img-fluid" style="height: 100px; object-fit: cover;" alt="Foto Kelas">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $kelas->judul }}</h5>
                    <p class="card-text">{{ implode(' ', array_slice(str_word_count($kelas->deskripsi, 1), 0, 6)) }}...</p>
                    <p class="card-text mt-auto">Kuota: {{ $kelas->kuota }} Peserta</p>
                    <div class="d-flex justify-content-between mt-2">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$kelas->id}}" data-bs-whatever="@mdo">Daftar</button>
                        <a href="{{ route('kelas.show', $kelas->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal{{$kelas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="exampleModalLabel">Daftar Kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('myclass.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_peserta" class="form-label">Nama Peserta:</label>
                                <input type="text" class="form-control" id="nama_peserta" name="nama_peserta" placeholder="Masukkan Nama Peserta">
                            </div>
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="id_kelas" value="{{ $kelas->id }}">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul:</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="{{ $kelas->judul }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga:</label>
                                <input type="text" class="form-control" id="harga" name="harga" value="{{ $kelas->harga }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="pelaksanaan" class="form-label">Waktu Pelaksanaan:</label>
                                <input type="text" class="form-control" id="pelaksanaan" name="pelaksanaan" value="{{ date('Y-m-d', strtotime($kelas->pelaksanaan)) }}" readonly>
                            </div>                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
