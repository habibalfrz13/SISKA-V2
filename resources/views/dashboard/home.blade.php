@extends('dashboard.main')

@section('content')
    <!-- Informasi Sertifikasi -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold">Informasi Sertifikasi</h5>
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="fw-semibold mb-3">Total Kelas: {{ $total }}</h4>
                            <div class="d-flex align-items-center">
                                <span class="me-2"><i class="ti ti-calendar text-primary fs-4"></i></span>
                                <div>
                                    <p class="mb-0">Sertifikasi Aktif: <span class="text-success">{{ $aktif }}</span></p>
                                    <p class="mb-0">Sertifikasi Tidak Aktif: <span class="text-danger">{{ $noaktif }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Daftar Sertifikasi -->
    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Daftar Sertifikasi</h5>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr><h6>
                                    <th>No</th>
                                    <th>Nama Sertifikasi</th>
                                    <th>Pelaksanaan</th>
                                    <th>Status</th>
                                </h6></tr>
                            </thead>
                            <tbody>
                                @foreach ($certifications as $index => $certification)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><h6>{{ $certification->judul }}</h6></td>
                                    <td> {{ \Carbon\Carbon::parse($certification->pelaksanaan)->format('d M Y') }}</td>
                                    <td><span class="badge bg-success">{{ $certification->status }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
