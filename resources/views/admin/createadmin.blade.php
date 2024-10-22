<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('users.tambahadmin') }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      background: linear-gradient(100deg, #020024 0%, #090979 50%, #00d4ff 100%);
      font-family: 'Open Sans', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 0;
      margin: 0;
    }
    .container {
      max-width: 600px;
      background-color: #fff;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 0 2rem rgba(0, 0, 0, 0.1);
      animation: fadeInUp 0.5s ease;
    }
    .card-header {
      text-align: center;
      padding-bottom: 1rem;
      font-weight: bold;
      font-size: 1.5rem;
    }
    .form-control {
      background-color: #f5f5f5;
      border: none;
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
      border-radius: 0.5rem;
      transition: all 0.3s ease;
    }
    .form-control:focus {
      background-color: #e6e6e6;
      box-shadow: 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    button[type="submit"] {
      background-color: #667eea;
      color: #fff;
      border: none;
      border-radius: 0.5rem;
      padding: 0.75rem;
      transition: all 0.3s ease;
    }
    button[type="submit"]:hover {
      background-color: #5a67d8;
      box-shadow: 0 0.5rem 1rem rgba(102, 126, 234, 0.4);
    }
    .card-body i {
      color: #764ba2;
      margin-right: 10px;
    }
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <i class="fas fa-user-plus"></i> {{ __('users.tambahadmin') }}
      </div>
      <div class="card-body">
        <form method="POST" action="{{ route('daftaradmin.store') }}">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">{{ __('users.masukannama') }}</label>
            <input id="name" type="text" class="form-control" name="name" required placeholder="{{ __('users.Masukan_Nama_Admin') }}">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">{{ __('users.masukanemail') }}</label>
            <input id="email" type="email" class="form-control" name="email" required placeholder="{{ __('users.Masukan_Email_Admin') }}">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">{{ __('users.Masukan_Password') }}</label>
            <input id="password" type="password" class="form-control" name="password" required placeholder="{{ __('users.Masukan_Kata_Sandi_Admin') }}">
            <small class="text-muted">{{ __('users.minimal8') }}</small>
          </div>
          <div class="mb-3">
            <label for="password-confirm" class="form-label">{{ __('users.Ulangi_Kata_Sandi') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="{{ __('users.Ulangi_kata_Sandi_Admin') }}">
          </div>
          <button type="submit" class="btn btn-primary w-100">{{ __('users.tambahadmin') }}</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
