<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('Delete Data Personel - Penyimpanan Senjata Otomatis') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>
    <div class="container mt-5">
        <h2>Apakah kamu yakin untuk menghapus id senjata {{ $personnel->weapon_id }} dengan nama
            {{ $personnel->name }}
        </h2>
        <form style="display:inline-block" action="{{ route('personnel-delete', $personnel->personnel_id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('personnel') }}" class="btn btn-primary">Cancel</a>
    </div>
</body>

</html>

