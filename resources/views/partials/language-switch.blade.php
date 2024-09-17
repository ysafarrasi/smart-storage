<div class="dropdown">
    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        {{ app()->getLocale() == 'id' ? 'Bahasa Indonesia' : 'English' }}
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="{{ url('id/dashboard') }}">Bahasa Indonesia</a></li>
        <li><a class="dropdown-item" href="{{ url('en/dashboard') }}">English</a></li>
    </ul>
</div>
