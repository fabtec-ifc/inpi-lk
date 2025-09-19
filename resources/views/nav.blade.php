@php
    use Illuminate\Support\Facades\Route;

    $currentRouteName = Route::currentRouteName();
    $isHome = $currentRouteName === 'login.sucesso';
    $currentRouteTitle = $tituloPagina ?? ucwords(str_replace('.', ' ', $currentRouteName));
@endphp

<nav class="br-breadcrumb mt-2" aria-label="Breadcrumbs">
    <ol class="crumb-list" role="list">
        <li class="crumb home">
            <a class="br-button circle" href="{{ route('login.sucesso') }}" aria-label="Página inicial">
                <i class="fas fa-home"></i>
            </a>
        </li>

        @unless($isHome)
            <li class="crumb" data-active="active">
                <i class="icon fas fa-chevron-right"></i>
                <span tabindex="0" aria-current="page">{{ $currentRouteTitle }}</span>
            </li>
        @endunless
    </ol>
</nav>
