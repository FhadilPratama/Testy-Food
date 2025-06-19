@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container py-4">
        <div class="mb-4">
            <h2 class="fw-bold">📊 Dashboard</h2>
            <p class="text-muted">Ringkasan statistik aplikasi Anda.</p>
        </div>

        <!-- Info Cards -->
        <div class="row g-4 mb-4">
            {{-- Card Total Berita --}}
            <div class="col-md-3">
                <div class="card shadow-sm border-0 text-white bg-primary h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h6 class="text-white-50">Total Berita</h6>
                            <h3 class="fw-bold">{{ $jumlahBerita }}</h3>
                        </div>
                        <i class="bi bi-newspaper fs-1 text-white-50"></i>
                    </div>
                </div>
            </div>

            {{-- Card Galeri --}}
            <div class="col-md-3">
                <div class="card shadow-sm border-0 text-white bg-success h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h6 class="text-white-50">Total Galeri</h6>
                            <h3 class="fw-bold">{{ $jumlahGallery }}</h3>
                        </div>
                        <i class="bi bi-image fs-1 text-white-50"></i>
                    </div>
                </div>
            </div>

            {{-- Card Kontak --}}
            <div class="col-md-3">
                <div class="card shadow-sm border-0 text-white bg-warning h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h6 class="text-white-50">Pesan Kontak</h6>
                            <h3 class="fw-bold">{{ $jumlahPesan }}</h3>
                        </div>
                        <i class="bi bi-envelope fs-1 text-white-50"></i>
                    </div>
                </div>
            </div>

            {{-- Card Users --}}
            <div class="col-md-3">
                <div class="card shadow-sm border-0 text-white bg-dark h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <h6 class="text-white-50">Total Pengguna</h6>
                            <h3 class="fw-bold">{{ $jumlahUser }}</h3>
                        </div>
                        <i class="bi bi-people fs-1 text-white-50"></i>
                    </div>
                </div>
            </div>
        </div>


        <!-- Grafik -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="fw-semibold mb-3">📈 Statistik Berita per Bulan</h5>
                <canvas id="beritaChart" height="100"></canvas>
            </div>
        </div>

        <!-- Tabel Berita Terbaru -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="fw-semibold mb-3">📰 Berita Terbaru</h5>
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beritaTerbaru as $berita)
                            <tr>
                                <td>{{ $berita->judul }}</td>
                                <td>{{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d M Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pengguna Login -->
        @if ($user)
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="fw-semibold mb-2">👤 Info Pengguna</h5>
                    <p class="mb-1">Nama: <strong>{{ $user->name }}</strong></p>
                    <p class="mb-0">Email: <strong>{{ $user->email }}</strong></p>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('beritaChart');
        const beritaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($beritaPerBulan->pluck('bulan')) !!},
                datasets: [{
                    label: 'Jumlah Berita',
                    data: {!! json_encode($beritaPerBulan->pluck('jumlah')) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    borderRadius: 6
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>
@endsection