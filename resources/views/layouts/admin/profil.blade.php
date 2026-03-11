<div class="dropdown">
    <button class="btn btn-light dropdown-toggle d-flex align-items-center" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        @if(Auth::user()->logo)
            <img src="{{ asset('storage/' . Auth::user()->logo) }}" alt="Profil" class="rounded-circle" width="40" height="40">
        @else
            <img src="{{asset('assets/images/logos/favicon.png')}}" alt="Admin" class="rounded-circle" width="40" height="40">
        @endif
        <span class="ms-2">{{ Auth::user()->nama_lengkap }}</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
        <li><a class="dropdown-item" href="/profile">Profil</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item text-danger">Logout</button>
            </form>
        </li>
    </ul>
</div>
</div>

