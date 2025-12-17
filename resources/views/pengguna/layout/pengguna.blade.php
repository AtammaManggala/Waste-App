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
  </style>
</head>

<body>

<div class="container-fluid">
  <div class="row">

    <!-- Sidebar -->
    <div class="col-md-3 col-lg-2 sidebar p-3">
      <h5 class="sidebar-title mb-4">Waste-App</h5>

      <hr class="text-secondary">

      <a href="#">Halaman Utama</a>
      <a href="{{route('transaksiHarian.index')}}">Transaksi Harian</a>
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
        <h2>Halo 👋</h2>
        <p>Apa yang ingin kalian lakukan sekarang?</p>
      </div>

      <!-- Dashboard Cards -->
      <div class="row g-4">

        <div class="col-md-4">
          <div class="card card-dashboard p-3">
            <h6 class="text-muted">Total Poin</h6>
            <h3>0</h3>
            <small class="text-muted">Total poin yang dikumpulkan</small>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card card-dashboard p-3">
            <h6 class="text-muted">Total Botol</h6>
            <h3>0</h3>
            <small class="text-muted">Total botol yang sudah di scan</small>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card card-dashboard p-3">
            <h6 class="text-muted">Marketing</h6>
            <h3>8</h3>
            <small class="text-muted">Campaign aktif</small>
          </div>
        </div>

      </div>

    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>












<!-- <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="bg-secondary">
  <div class="bg-white container-sm col-6 border my-3 rounded px-5 py-3 pb-5">
    <h1>Halo!!</h1>
    <div>Selamat datang di halaman admin</div>
    <div><a href="/logout" class="btn btn-sm btn-secondary">Logout >></a></div>
    <div class="card mt-3">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Menu Operator</li>
        <li class="list-group-item">Menu keuangan</li>
        <li class="list-group-item">Menu Marketing</li>
      </ul>
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
</body>

</html> -->