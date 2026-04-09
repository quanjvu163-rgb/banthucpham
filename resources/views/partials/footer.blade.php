@php
    $variant = $variant ?? 'default';
    $year = $year ?? '2023';
@endphp

<hr class="hr--large">
<div class="space" style="text-align: center; background-color: #white">
    @if($variant === 'default')
        <img src="{{ asset('image/thanhspace.PNG') }}" alt="Footer banner">
    @endif
    <p class="site-footer__copyright-content mb-0">
        © {{ $year }},
        <a href="{{ url('/index.php') }}" style="color: red">Nhóm 5</a>
    </p>
</div>