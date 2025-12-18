<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>QR Code Saya</title>

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
    .card-dashboard {
      border: none;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
  </style>
</head>

<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3 col-lg-2 sidebar p-3">
      <h5 class="sidebar-title mb-4">Waste-App</h5>

      <hr class="text-secondary">

      <a href="{{route('pengguna.index')}}">Halaman Utama</a>
      <a href="{{route('profil.index')}}">Profil</a>
      <a href="{{route('transaksiHarian.index')}}">Transaksi Harian</a>
      <a href="#">Rekap Transaksi</a>
      <a href="#">Daftar Hadiah</a>
      <a href="#">Riwayat Penukaran Hadiah</a>

      <hr class="text-secondary">

      <!-- JANGAN DIUBAH -->
      <a href="/logout" class="text-danger">Logout</a>
    </div>

    <!-- Content -->
    <div class="col-md-9 col-lg-10 p-4">

      <div class="mb-4 text-white">
        <h3>QR Code Saya</h3>
        <p>Gunakan QR Code ini untuk melakukan transaksi</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-6">

          <div class="card card-dashboard p-4 text-center">
            <!-- qrcode -->
            <div class="mb-3">
              {{ $qrCode}}
            </div>

            <hr>

            <!-- biodata -->
            <p><strong>Nama</strong> : {{ auth()->user()->name }}</p>
            <p><strong>Email</strong> : {{ auth()->user()->email }}</p>
            <p><strong>Role</strong> : {{ auth()->user()->role }}</p>

          </div>

        </div>
      </div>

    </div>

  </div>
</div>
</body>
</html>
