<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit User</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #43cea2, #185a9d);
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
  </style>
</head>

<body>

<div class="container py-5">

  <div class="mb-4 text-white">
    <h2>Edit Data User</h2>
    <p>Perbarui informasi user</p>
  </div>

  <div class="card">
    <div class="card-body">

      <form action="{{ route('daftarUser.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" name="name" class="form-control"
                 value="{{ $users->name }}" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control"
                 value="{{ $users->email }}" required>
        </div>

        <div class="d-flex justify-content-end">
          <a href="{{ route('daftarUser.index') }}" class="btn btn-secondary me-2">
            Batal
          </a>
          <button type="submit" class="btn btn-primary">
            Simpan Perubahan
          </button>
        </div>

      </form>

    </div>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
