@extends('dashboard.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        @if ($myclass->isEmpty())
        <div class="col-lg-12 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Anda Belum Mengikuti Kelas Apapun</h5>
                </div>
            </div>
        </div>
        @else
            @foreach ($myclass as $data => $kelas)
            @php
                 $data = App\Models\Kelas::where('id', $kelas->id_kelas)->first();
            @endphp
            <div class="col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ url('images/galerikelas/'.$kelas->test->foto )}}" class="card-img-top img-fluid" style="height: 200px;" alt="Foto Kelas">
                    <div class="card-body">
                        <h5 class="card-title">{{ $kelas->test->judul }}</h5>
                        <p class="card-text">Waktu Pelaksanaan: {{ \Carbon\Carbon::parse($kelas->test->pelaksanaan)->format('d M Y') }}</p>
                        <p class="card-text">Status: {{ $kelas->status }}</p>
                        <div class="d-flex justify-content-between">
                            @if($kelas->status == 'Aktif')
                                <a href="" class="btn btn-success">GoToClass</a>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{$kelas->id_kelas}}">Detail</button>
                            @elseif($kelas->status == 'Belum dibayar')
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{$kelas->id_kelas}}">Hapus</button>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#paymentModal{{$kelas->id_kelas}}">Pembayaran</button>
                            @elseif($kelas->status == 'Pending')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{$kelas->id_kelas}}">Detail</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal for deleting class -->
            <div class="modal fade" id="hapusModal{{$kelas->id_kelas}}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusModalLabel">Hapus Kelas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus kelas ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <form action="{{ route('myclass.destroy', $kelas->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal for payment information -->
            <div class="modal fade" id="paymentModal{{$kelas->id_kelas}}" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="paymentModalLabel">Informasi Pembayaran</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Metode Pembayaran: Transfer Bank</h6>
                            <!-- Informasi rekening bank -->
                            <p>Informasi Nomor Rekening:</p>
                            <p>Nomor Rekening: 1234-5678-9012</p>
                            <p>Nama Bank: Bank ABC</p>
                            <hr>
                            <h6>Metode Pembayaran: Pembayaran Elektronik</h6>
                            <!-- Informasi pembayaran elektronik -->
                            <p>Metode Pembayaran: DANA</p>
                            <p>Nomor DANA: 081234567890</p>
                            <hr>
                            <!-- Form input for file upload -->
                            <p>Jumlah yang harus Dibayar:<h6>Rp. {{$data->harga }}</h6></p>
                            <hr>
                            <form method="POST" action="{{ route('myclass.update', $kelas->id) }}" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Unggah Bukti Transfer</label>
                                    <input type="file" class="form-control" id="foto" name="foto">
                                </div>
                                <button type="submit" class="btn btn-primary">Unggah Bukti Transfer</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal for detail -->
            <div class="modal fade" id="detailModal{{$kelas->id_kelas}}" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="detailModalLabel">Detail Kelas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Your class details go here -->
                            <p>Judul Kelas: {{ $kelas->test->judul }}</p>
                            <p>Kuota: {{ $kelas->test->kuota }}</p>
                            <p>Status: {{ $kelas->status }}</p>
                            <!-- End of class details -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
