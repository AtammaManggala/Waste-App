<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Rekap Transaksi</title>

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
    th, td {
      border-right: 1px solid black;
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

      <a href="{{route('admin.index')}}">Halaman Utama</a>
      <a href="{{route('daftarUser.index')}}">Data User</a>
      <a href="{{route('rekapTransactions.index')}}">Data Transaksi Harian</a>
      <a href="{{route('rewardAdmin.index')}}">Data Reward</a>

      <hr class="text-secondary">

      <!-- JANGAN DIUBAH -->
      <a href="/logout" class="text-danger">Logout</a>
    </div>

    <!-- Content -->
    <div class="col-md-9 col-lg-10 content">

      <div class="mb-4 text-white">
        <h2>Rekap Transaksi</h2>
        <p>Ringkasan pengumpulan botol seluruh user</p>
      </div>

      <!-- SUMMARY -->
      <div class="row mb-4">
        <div class="col-md-6 mb-3">
          <div class="card shadow-sm border-0">
            <div class="card-body">
              <h6 class="fw-bold mb-1">Total Botol Terkumpul</h6>
              <h3 class="text-muted">{{ $totalBotol }} Botol</h3>
            </div>
          </div>
        </div>

        <div class="col-md-6 mb-3">
          <div class="card shadow-sm border-0">
            <div class="card-body">
              <h6 class="fw-bold mb-1">Total Poin Dihasilkan</h6>
              <h3 class="text-muted">{{ $totalPoint }} Poin</h3>
            </div>
          </div>
        </div>
      </div>

      <!-- CARD -->
      <div class="card card-dashboard">
        <div class="card-body p-0">

          <!-- FILTER -->
          <form method="GET" class="p-3 border-bottom">
            <div class="row g-2 align-items-end">

              <div class="col-md-4">
                <label class="form-label fw-semibold">Pilih User</label>
                <select name="user_id" class="form-select">
                  <option value="">Semua User</option>
                  @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user_id == $user->id ? 'selected' : '' }}>
                      {{ $user->name }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-3">
                <label class="form-label fw-semibold">Dari Tanggal</label>
                <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
              </div>

              <div class="col-md-3">
                <label class="form-label fw-semibold">Sampai Tanggal</label>
                <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
              </div>

              <div class="col-md-2 d-flex gap-2">
                <button class="btn btn-primary w-100">Tampilkan</button>
                <a href="{{ route('rekapTransactions.index') }}" class="btn btn-outline-secondary w-100">
                  Reset
                </a>
              </div>

            </div>
          </form>

          <!-- TABLE REKAP -->
          <table class="table table-hover mb-0 table-rounded">
            <thead class="table-light">
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama User</th>
                <th>Jumlah Botol</th>
                <th>Total Poin</th>
              </tr>
            </thead>
            <tbody>
              @forelse($rekapHarian as $i => $row)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ \Carbon\Carbon::parse($row['tanggal'])->format('d M Y') }}</td>
                  <td>{{ $row['name'] }}</td>
                  <td>{{ $row['jml_botol'] }} botol</td>
                  <td>{{ $row['jml_point'] }} poin</td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center text-muted py-4">
                    Data rekap belum tersedia
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>

        </div>
      </div>

    </div>
  </div>
</div>
</body>
</html>
