<form method="post">
    <ul class="media-grid" data-module="media-grid">
        <li class="media-item">
            @if ($dataset->logo_sektor != null)
                <img src="/images/sektoral/{{ $dataset->logo_sektor }}"
                alt="logo-sektoral" class="media-image img-responsive">
            @else
                <img src="/images/assets/sektoral.png"
                alt="logo-sektoral" class="media-image img-responsive">
            @endif
            <h3 class="media-heading">{{ $dataset->nama_sektor }}</h3>
            <a href="{{ route('user.sektoralDetail', $dataset->sektorId) }}" class="media-view">
                <span>{{ $dataset->nama_sektor }}</span>
            </a>
        </li>
    </ul>
</form>
