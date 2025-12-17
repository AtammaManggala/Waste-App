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

      <a href="{{route('pengguna.index')}}">Halaman Utama</a>
      <a href="{{ route('transaksiHarian.index')}}">Transaksi Harian</a>
      <a href="#">Rekap Transaksi</a>
      <a href="#">Daftar Hadiah</a>
      <a href="#">Riwayat Penukaran Hadiah</a>

      <hr class="text-secondary">

      <!-- JANGAN DIUBAH -->
      <a href="/logout" class="text-danger">Logout</a>
    </div>

    <!-- Content -->
    <div class="col-md-9 col-lg-10 content">
      
      <div class="mb-4 text-white">
        <h2>Transaksi Harian</h2>
        <p>Daftar hasil scan botol hari ini</p>
      </div>

      <!-- Card Tabel -->
      <div class="card card-dashboard">
        <div class="card-body p-0">

          <table class="table table-hover mb-0 table-rounded table-line">
            <thead class="table-light">
                <tr>
                    <th class="rounded-start">No</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th class="rounded-end">Jumlah Botol</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach($data as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->scan_date }}</td>
                    <td>{{ $row->scan_time }}</td>
                    <td>{{ $row->jml_botol }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        </div>
      </div>

    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
