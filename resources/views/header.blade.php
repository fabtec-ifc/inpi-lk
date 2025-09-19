<header class="br-header compact">
  <div class="container-lg my-2">
    <div class="header-top">
      <div class="header-actions m-0">
        <span class="br-divider vertical mx-half mx-sm-1"></span>
        <div class="header-login">
          <div class="header-sign-in">
            @auth
        <style>
          #avatar-dropdown-trigger {
          height: auto;
          padding: var(--spacing-scale-base);
          }
        </style>
        <div>
          <button class="br-sign-in" type="button" id="avatar-dropdown-trigger" data-toggle="dropdown"
          data-target="avatar-menu" aria-label="Olá, Fulano"><span class="br-avatar"
            title="Fulano da Silva"></span><span class="ml-2 text-gray-80 text-weight-regular">Olá, <span
            class="text-weight-semi-bold">{{ Auth::user()->name }}</span></span><i class="fas fa-caret-down"
            aria-hidden="true"></i>
          </button>
          <div class="br-list absolute z-50" id="avatar-menu" hidden="hidden" role="menu"
aria-labelledby="avatar-dropdown-trigger">

          <a class="br-item" href="/profile" role="menuitem">Perfil</a>
          <a class="br-item" href="/politicas" role="menuitem">Privacidade</a>
          <a class="br-item" href="/termos" role="menuitem">Termos</a>
          </div>
        </div>
      @else
    <button class="br-sign-in small" type="button" data-trigger="login"
      onclick="window.location.href='{{ route('login') }}'">
      <i class="fas fa-user" aria-hidden="true"></i>
      <span class="d-sm-inline">Entrar</span>
    </button>
  @endauth
          </div>
        </div>
      </div>
    </div>
    <div class="header-bottom">
      <div class="header-menu">
        <div class="header-menu-trigger">
          @auth
          <button class="br-button small circle" type="button" aria-label="Menu" data-toggle="menu"
            data-target="#main-navigation" id="menu-compact"><i class="fas fa-bars" aria-hidden="true"></i>
          </button>
          @endauth
        </div>
        <div class="header-info">
          <div class="header-title">
            <a href="/" class="text-inherit no-underline">GAIA</a>
          </div>
        </div>
      </div>
      <div class="header-search">
        <div class="br-input has-icon">
          <label for="searchbox-98886">Texto da pesquisa</label>
          <input id="searchbox-98886" type="text" placeholder="O que você procura?" />
          <button class="br-button circle small" type="button" aria-label="Pesquisar"><i class="fas fa-search"
              aria-hidden="true"></i>
          </button>
        </div>
        <button class="br-button circle search-close ml-1" type="button" aria-label="Fechar Busca"
          data-dismiss="search"><i class="fas fa-times" aria-hidden="true"></i>
        </button>
      </div>
    </div>
  </div>
</header>


<div class="row">
  <div class="br-menu" id="main-navigation">
    <div class="menu-container">
      <div class="menu-panel">
        <div class="menu-header">
          <div class="menu-title"><span>GAIA</span></div>
          <div class="menu-close">
            <button class="br-button circle" type="button" aria-label="Fechar o menu" data-dismiss="menu"><i
                class="fas fa-times" aria-hidden="true"></i>
            </button>
          </div>
        </div>
        <nav class="menu-body" role="tree">
            <a class="menu-item divider no-underline" href="{{ route('registros.create') }}" role="treeitem">
                <span class="icon"><i class="fas fa-stream" aria-hidden="true"></i></span>
                <span class="content">Registros</span>
            </a>
            <a class="menu-item divider no-underline" href="" role="treeitem">
                <span class="icon"><i class="fas fa-info-circle" aria-hidden="true"></i></span>
                <span class="content">Sobre</span>
            </a>
            <a class="menu-item divider no-underline" href="{{ route('unidades.index') }}" role="treeitem">
                <span class="icon"><i class="fas fa-university" aria-hidden="true"></i></span>
                <span class="content">Unidades</span>
            </a>
            <a class="menu-item divider no-underline" href="{{ route('pesquisa') }}" role="treeitem">
                <span class="icon"><i class="fas fa-university" aria-hidden="true"></i></span>
                <span class="content">Pesquisar</span>
            </a>
        </nav>
        <div class="menu-footer">
          <div class="menu-info">
            <div class="text-center text-down-01">Todo o conteúdo deste site está publicado sob a licença
              <strong>Creative Commons Atribuição-SemDerivações 3.0</strong>
            </div>
          </div>
        </div>
      </div>
      <div class="menu-scrim" data-dismiss="menu" tabindex="0"></div>
    </div>
  </div>
</div>
