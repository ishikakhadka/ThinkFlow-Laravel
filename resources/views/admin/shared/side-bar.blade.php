<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">

            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.dashboard') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard

                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.ideas') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('admin.ideas') }}">
                    <i class="fas fa-brain"></i> Ideas

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('admin.users') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('admin.users') }}">
                    <i class="fas fa-user"></i> Users

                </a>
            </li>



        </ul>
    </div>
   {{-- <div class="card-footer text-center py-2">
    <a class="btn btn-sm btn-link" href="{{ route('lang', 'en') }}">EN</a>
    <a class="btn btn-sm btn-link" href="{{ route('lang', 'es') }}">ES</a>
    <a class="btn btn-sm btn-link" href="{{ route('lang', 'fr') }}">FR</a>
</div> --}}

    <div class="card-footer text-center py-2 gap-4">
        <a class="nav-link {{ Route::is('dashboard') ? 'text-white bg-primary rounded' : '' }}"
            href="{{ route('dashboard') }}">
            <i class="fas fa-arrow-right"></i> Back to User Dashboard
        </a>
    </div>

</div>
