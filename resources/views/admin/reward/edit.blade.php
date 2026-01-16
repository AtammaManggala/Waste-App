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

<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-md-6 col-lg-5">

            <div class="card shadow-sm">
                <div class="card-header fw-bold text-center">
                    Edit Reward
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('rewardAdmin.update', $rewards->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nama Reward</label>
                            <input type="text"
                                   name="reward_name"
                                   class="form-control"
                                   value="{{ old('reward_name', $rewards->reward_name) }}"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Poin</label>
                            <input type="number"
                                   name="point"
                                   class="form-control"
                                   value="{{ old('point', $rewards->point) }}"
                                   min="1"
                                   required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('rewardAdmin.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary">
                                Update Reward
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
