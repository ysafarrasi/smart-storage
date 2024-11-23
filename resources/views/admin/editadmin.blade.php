<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
    background-color: #f8f9fa;
    font-family: 'Arial', sans-serif;
    }
    .container {
    margin-top: 50px;
    }
    .card {
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }
</style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card">
        <div class="card-header text-center">Edit Admin</div>
        <div class="card-body">
            <form action="{{ route('daftaradmin.update', $user->id ?? '') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <input type="hidden" name="id" value="{{ $user->id ?? '' }}">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input id="name" type="text" class="form-control" name="name"
                        value="{{ old('name', $user->name) }}" placeholder="Masukkan nama" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" type="email" class="form-control" name="email"
                        value="{{ old('email', $user->email) }}" placeholder="Masukkan email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Kata Sandi (isi jika ingin mengganti)</label>
                    <input id="password" type="password" class="form-control" name="password"
                        placeholder="Masukkan kata sandi baru" autocomplete="new-password">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                    <input id="password_confirmation" type="password" class="form-control"
                        name="password_confirmation" placeholder="Konfirmasi kata sandi baru" autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-warning w-100">Simpan Perubahan</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>
