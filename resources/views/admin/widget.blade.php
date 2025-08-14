<div class="card text-center shadow-sm {{ $bgClass ?? 'bg-white' }}" style="width: 270px; height: 140px;">
    <div class="card-body d-flex flex-column justify-content-center align-items-center text-white">
        <div class="mb-2">
            <i class="{{ $icon }} fa-2x"></i>
        </div>
        <h5 class="card-title mb-1">{{ $title }}</h5>
        <h3 class="card-text m-0">{{ $data }}</h3>
    </div>
</div>
