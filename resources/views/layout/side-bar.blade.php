<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">

            <li class="nav-item">
                <a class="nav-link {{ Route::is('dashboard') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i> Home

                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::is('terms') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('terms') }}">
                    <i class="fas fa-file-alt"></i> Terms & Conditions

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('feed') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('feed') }}">
                    <i class="fas fa-newspaper me-1"></i> Feed

                </a>
            <li class="nav-item">
                <a class="nav-link {{ Route::is('trending') ? 'text-white bg-primary rounded' : '' }}"
                    href="{{ route('trending') }}">
                    <i class="fas fa-fire-alt"></i> Trending
                </a>
            </li>



        </ul>
    </div>
    <div class="card-footer text-center py-2">
        <a class="nav-link {{ Route::is('profile') ? 'text-white bg-primary rounded' : '' }}"
            href="{{ route('profile') }}">
            <i class="fas fa-user"></i> View Profile
        </a>
    </div>

</div>
