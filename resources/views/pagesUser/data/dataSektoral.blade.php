@foreach ($sektoral as $item)
<li class="media-item">
    @if ($item->logo_sektor != null)
        <img src="/images/sektoral/{{ $item->logo_sektor }}"
            alt="logo-sektoral" class="img-responsive media-image">
    @else
        <img src="/images/assets/sektoral.png"
            alt="logo-sektoral" class="img-responsive media-image">
    @endif
    <h3 class="media-heading">{{ $item->nama_sektor }}</h3>
    <strong class="count">{{ $dataset->where('kode_sektoral', $item->kode_sektor)->count() }} Datasets</strong>
    <a href="javascript:detailSektoral('{{ $item->kode_sektor }}')"
        title="{{ $item->nama_sektor }}" class="media-view">
        <span>{{ $item->nama_sektor }}</span>
    </a>
</li>
@endforeach
