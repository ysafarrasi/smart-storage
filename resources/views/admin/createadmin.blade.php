<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f7f7f7;
      font-family: 'Open Sans', sans-serif;
    }
    .container {
      margin-top: 50px;
      margin-bottom: 50px;
    }
    .card {
      border-radius: 1rem;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
      background-color: #fff;
      padding: 1rem;
    }
    @media (max-width: 768px) {
      .container {
        margin-top: 20px;
        margin-bottom: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 col-sm-12">
        <div class="card">
          <div class="card-header text-center"><H1 class="text-bold">Tambah Admin</H1></div>
          <div class="card-body">
            <form method="POST" action="{{ route('daftaradmin.store') }}">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input id="name" type="text" class="form-control" name="name" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control" name="email" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input id="password" type="password" class="form-control" name="password" required>
              </div>
              <div class="mb-3">
                <label for="password-confirm" class="form-label">Konfirmasi Kata Sandi</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
              <button type="submit" class="btn btn-primary w-100">Tambah</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

