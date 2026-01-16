<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
  body {
    min-height: 100vh;
    background: linear-gradient(135deg, #43cea2, #185a9d);
  }

  .sidebar {
    min-height: 100vh;
    background-color: #1f2937;
  }

  .sidebar a {
    color: #d1d5db;
    text-decoration: none;
    padding: 12px 15px;
    display: block;
    border-radius: 6px;
  }

  .sidebar a:hover {
    background-color: #374151;
    color: #ffffff;
  }

  .sidebar-title {
    font-weight: 600;
    color: #ffffff;
  }

  .content {
    padding: 30px;
  }

  .card-dashboard {
    border: none;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
  }

  .table-rounded {
    border-radius: 14px;
    overflow: hidden;
  }

  th {
    border-right: 1px solid black;

  }

  td {
    border-right: 1px solid black;

  }

  .table-rounded thead th.rounded-start {
    border-top-left-radius: 14px;
  }

  .table-rounded thead th.rounded-end {
    border-top-right-radius: 14px;
  }
  </style>
</head>

<body>

<div class="container-fluid">
  <div class="row">

    <!-- Sidebar -->
    <div class="col-md-3 col-lg-2 sidebar p-3">
      <h5 class="sidebar-title mb-4">Waste-App</h5>

      <hr class="text-secondary">

      <a href="{{ route('pengguna.index') }}">Halaman Utama</a>
      <a href="{{ route('profil.index') }}">Profil</a>
      <a href="{{ route('transaksiHarian.index') }}">Transaksi Harian</a>
      <a href="{{route('rekapTransaksi.index')}}">Rekap Transaksi</a>
      <a href="{{route('reward.index')}}">Daftar Hadiah</a>
      <a href="{{route('historyReward.index')}}">Riwayat Penukaran Hadiah</a>

      <hr class="text-secondary">

      <!-- JANGAN DIUBAH -->
      <a href="/logout" class="text-danger">Logout</a>
    </div>

    <!-- Content -->
    <div class="col-md-9 col-lg-10 content">
      
      <div class="mb-4 text-white">
        <h2>Rekap Transaksi</h2>
        <p>Ringkasan hasil pengumpulan botol yang telah Anda lakukan</p>
      </div>

      <div class="row mb-4">
      <!-- Total Botol -->
      <div class="col-md-6 mb-3">
        <div class="card shadow-sm border-0">
          <div class="card-body d-flex align-items-center">
            <div class="me-3 fs-1 text-success">
              <i class="bi bi-recycle"></i>
            </div>
            <div>
              <h6 class="fw-bold mb-0">Total Botol Terkumpul</h6>
              <h3 class="text-muted mb-1">{{ $jml_botol }} Botol</h3>
            </div>
          </div>
        </div>
      </div>

      <!-- Total Poin -->
      <div class="col-md-6 mb-3">
        <div class="card shadow-sm border-0">
          <div class="card-body d-flex align-items-center">
            <div class="me-3 fs-1 text-warning">
              <i class="bi bi-star-fill"></i>
            </div>
            <div>
              <h6 class="fw-bold mb-0">Total Poin Didapat</h6>
              <h3 class="text-muted mb-1">{{ $jml_point }} Poin</h3>
            </div>
          </div>
        </div>
      </div>
    </div>


      <!-- Card -->
      <div class="card card-dashboard">
        <div class="card-body p-0">

          <!-- FILTER TANGGAL -->
          <form method="GET" class="p-3 border-bottom">
            <div class="row g-2 align-items-end">

              <div class="col-md-4">
                <label class="form-label fw-semibold">Dari Tanggal</label>
                <input type="date"
                       name="start_date"
                       class="form-control"
                       value="{{ request('start_date') }}">
              </div>

              <div class="col-md-4">
                <label class="form-label fw-semibold">Sampai Tanggal</label>
                <input type="date"
                       name="end_date"
                       class="form-control"
                       value="{{ request('end_date') }}">
              </div>

              <div class="col-md-4 d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                  Tampilkan
                </button>

                <a href="{{ route('countTransaction.index') }}"
                   class="btn btn-outline-secondary">
                  Reset
                </a>
              </div>

            </div>
          </form>
          <!-- END FILTER -->

          <!-- TABEL -->
          <table class="table table-hover mb-0 table-rounded table-line">
            <thead class="table-light">
              <tr>
                <th class="rounded-start">No</th>
                <th>Tanggal</th>
                <th>Waktu Terakhir Scan</th>
                <th>Jumlah Botol</th>
                <th class="rounded-end">Total Poin</th>
              </tr>
            </thead>
            <tbody>
              @php 
                $no = 1; 
                $poinPerBotol = $poinPerBotol ?? 5;
              @endphp

              @forelse($data as $row)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ \Carbon\Carbon::parse($row->scan_date)->format('d M Y') }}</td>
                  <td>{{ \Carbon\Carbon::parse($row->scan_time)->format('H:i') }}</td>
                  <td>{{ $row->jml_botol }} botol</td>
                  <td>{{ $row->jml_botol * $poinPerBotol }} poin</td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center text-muted py-4">
                    Belum ada transaksi botol
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
          <!-- END TABEL -->

        </div>
      </div>

    </div>
  </div>
</div>

