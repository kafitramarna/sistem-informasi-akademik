<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js"></script>
    <style>
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif !important;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11" !important;
        }
    </style>
</head>

<body class="d-flex flex-column">
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="card card-md">
                <div class="card-body">
                    <div class="text-center">
                        <a href="/login" class="navbar-brand navbar-brand-autodark">
                            <img src="https://upload.wikimedia.org/wikipedia/id/b/b7/Logo-Universitas-Muhammadiyah-Semarang.png"
                                height="150" alt="Logo Aplikasi" class="rounded">
                            {{-- <img src="{{ asset('img/logo-baznas.png') }}" height="90" alt="Logo Aplikasi" class="rounded"> --}}
                        </a>
                    </div>
                    <h2 class="h2 text-center mb-2">
                        Sistem Informasi Akademik Unimus
                    </h2>
                    <p class="text-center text-muted mb-4">
                        Mahasiswa, gunakan NIM sebagai username. Dosen dan admin, silakan gunakan NIK sebagai username.
                    </p>
                    <form action="{{ route('login-process') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                name="username" placeholder="Username" autocomplete="off" value="{{ old('username') }}"
                                required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" placeholder="Password" autocomplete="off" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-footer">
                            <button class="btn btn-primary w-100">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css">
</body>

</html>
