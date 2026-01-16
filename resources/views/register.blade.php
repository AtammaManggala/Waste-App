<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Login</title>

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #43cea2, #185a9d);
            display: flex;
            align-items: center;
        }
        .login-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        .login-title {
            font-weight: 600;
        }

        .btn-primary {
            background-color: #0d6efd !important;
            border-color: #0d6efd !important;
            color: #fff !important;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #0d6efd !important;
            border-color: #0d6efd !important;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card login-card">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4 login-title">Buat Akun</h3>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">name</label>
                            <input 
                                type="nama" 
                                value="{{ old('name') }}" 
                                name="name" 
                                class="form-control"
                                placeholder="Masukkan Nama"
                            >
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input 
                                type="email" 
                                value="{{ old('email') }}" 
                                name="email" 
                                class="form-control"
                                placeholder="Masukkan Email"
                            >
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input 
                                type="password" 
                                name="password" 
                                class="form-control"
                                placeholder="Masukkan password"
                            >
                        </div>

                        <div class="d-grid gap-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                Daftar
                            </button>

                            <a href="{{ url('/') }}" class="btn btn-outline-primary btn-lg">
                                Kembali ke Login
                            </a>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>





