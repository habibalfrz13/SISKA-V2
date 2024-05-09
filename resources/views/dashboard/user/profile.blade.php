@extends('dashboard.main')

@section('content')
    <div class="row p-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>User Profile</h2>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card border-info shadow-lg h-100">
                <div class="card-body">
                    <div class="text-center">
                        @if(auth()->user()->foto)
                            <img src="{{ Storage::url('user/' . auth()->user()->foto) }}" class="img-fluid rounded" alt="User Photo" style="max-width: 100%; max-height: 200px;">
                        @else
                            <div class="text-muted">No photo available</div>
                        @endif
                        <h4 class="mt-3">{{ auth()->user()->name }}</h4>
                        <p>{{ auth()->user()->bio ?: 'Bio not specified' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-info shadow-lg h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Username:</strong>
                                <span class="ml-3">{{ auth()->user()->username }}</span>
                            </div>

                            <div class="form-group">
                                <strong>Email:</strong>
                                <span class="ml-5">{{ auth()->user()->email }}</span>
                            </div>

                            <div class="form-group">
                                <strong>Jenis Kelamin:</strong>
                                <span class="ml-2">{{ auth()->user()->jenis_kelamin ?: 'Not specified' }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Nomor Telepon:</strong>
                                <span class="ml-3">{{ auth()->user()->nomor_hp ?: 'Not specified' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
