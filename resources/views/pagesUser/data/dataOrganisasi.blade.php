@foreach ($organisasi as $item)
<li class="media-item">
    @if ($item->logo_organisasi != null)
        <img src="/images/organisasi/{{ $item->logo_organisasi }}"
            alt="logo-organisasi" class="img-responsive media-image">
    @else
        <img src="/images/assets/organisasi.png"
            alt="logo-organisasi" class="img-responsive media-image">
    @endif
    <h3 class="media-heading">{{ $item->nama_organisasi }}</h3>
    <strong class="count">{{ $dataset->where('kode_organisasi', $item->kode_organisasi)->count() }} Datasets</strong>
    <a href="#"
        title="{{ $item->nama_organisasi }}" class="media-view">
        <span>{{ $item->nama_organisasi }}</span>
    </a>
</li>
@endforeach
