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
        <h2>Daftar Reward</h2>
        <p>Data reward dan riwayat reward seluruh user</p>
      </div>


    <!-- tabel reward -->
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Reward</h5>

            <a  href="{{ route('rewardAdmin.create') }}"
                class="btn btn-primary btn-sm">
                + Tambah Reward
            </a>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Reward</th>
                        <th>Poin</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rewards as $i => $reward)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $reward->reward_name }}</td>
                            <td>{{ $reward->point }}</td>
                            <td>{{ $reward->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{route('rewardAdmin.edit',$reward->id)}}"
                                class="btn btn-warning">update</a> 
                                | 
                                <a href="{{route('rewardAdmin.delete',$reward->id)}}" 
                                class="btn btn-danger">delete</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Data reward belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <div class="card mb-3">
        <div class="card-body">
            <form method="GET" action="{{ route('rewardAdmin.index') }}">
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <label class="form-label">User</label>
                        <select name="user_id" class="form-select">
                            <option value="">-- Semua User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ request('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="start_date"
                            class="form-control"
                            value="{{ request('start_date') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Tanggal Akhir</label>
                        <input type="date" name="end_date"
                            class="form-control"
                            value="{{ request('end_date') }}">
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">
                            Filter
                        </button>
                        <a href="{{ route('rewardAdmin.index') }}" class="btn btn-outline-secondary w-100">
                            Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">History Reward User</h5>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>User</th>
                        <th>Reward</th>
                        <th>Point</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rewardTransactions as $i => $trx)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $trx->created_at->format('d M Y') }}</td>
                            <td>{{ $trx->user->name ?? '-' }}</td>
                            <td>{{ $trx->reward->reward_name ?? '-' }}</td>
                            <td>{{ $trx->reward->point }} poin</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                History reward belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>