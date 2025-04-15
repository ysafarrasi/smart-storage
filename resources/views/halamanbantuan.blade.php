<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('users.halamanbantuan_title') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">{{ __('users.Penyimpanan Senjata Otomatis') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/dashboard') }}">{{ __('users.Dashboard') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile') }}">{{ __('users.Profil Saya') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/help') }}">{{ __('users.Butuh Bantuan?') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/logout') }}">{{ __('users.Keluar') }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center mb-4">{{ __('users.halamanbantuan_heading') }}</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('users.halamanbantuan_technical_support') }}</h5>
                        <p class="card-text">{{ __('users.halamanbantuan_technical_support_desc') }}</p>
                        <a href="https://wa.me/+628216500421" target="_blank" class="btn btn-primary">{{ __('users.halamanbantuan_contact_support') }}</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('users.halamanbantuan_billing_inquiries') }}</h5>
                        <p class="card-text">{{ __('users.halamanbantuan_billing_inquiries_desc') }}</p>
                        <a href="#" class="btn btn-primary">{{ __('users.halamanbantuan_billing_help') }}</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ __('users.halamanbantuan_general_questions') }}</h5>
                        <p class="card-text">{{ __('users.halamanbantuan_general_questions_desc') }}</p>
                        <a href="#" class="btn btn-primary">{{ __('users.halamanbantuan_ask_us') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <h4 class="mb-3">{{ __('users.halamanbantuan_contact_us') }}</h4>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('users.halamanbantuan_name') }}</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('users.halamanbantuan_email') }}</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">{{ __('users.halamanbantuan_message') }}</label>
                    <textarea class="form-control" id="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">{{ __('users.halamanbantuan_submit') }}</button>
            </form>
        </div>
    </div>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
