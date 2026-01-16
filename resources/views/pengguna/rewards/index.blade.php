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
      <a href="{{route('profil.index')}}">Profil</a>
      <a href="{{route('transaksiHarian.index')}}">Transaksi Harian</a>
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
      <h2>Daftar Hadiah</h2>
      <p>Tukarkan poin Anda dengan hadiah yang tersedia</p>
    </div>


    <!-- alert notifikasi -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mx-3 mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mx-3 mt-3" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <!-- end alert -->


    <!-- Card Tabel Reward -->
    <div class="card card-dashboard">
      <div class="card-body p-0">

        <table class="table table-hover mb-0 table-rounded table-line">
          <thead class="table-light">
            <tr>
              <th class="rounded-start">No</th>
              <th>Nama Hadiah</th>
              <th>Poin Dibutuhkan</th>
              <th class="rounded-end text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @php $no = 1; @endphp
            @foreach($rewards as $reward)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $reward->reward_name }}</td>
              <td>
                <span class="badge bg-warning text-dark">
                  {{ number_format($reward->point) }} Poin
                </span>
              </td>
              <td class="text-center">
                <form action="{{ route('reward.tukar', $reward->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-success">
                    Tukar
                  </button>
                </form>
              </td>
            </tr>
            @endforeach

            @if($rewards->isEmpty())
            <tr>
              <td colspan="5" class="text-center text-muted py-3">
                Belum ada hadiah tersedia
              </td>
            </tr>
            @endif
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
