<nav class="navbar navbar-expand-md">
    <div class="navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <div class="nav-link">
                    <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg></button>
                </div>
            </li>
            @auth
                <li class="nav-item">
                    <div class="dropdown nav-link">
                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                            @if (Auth::user()->foto)
                                <img src="{{ asset('user/' . Auth::user()->foto) }}" class="rounded-circle"
                                    alt="Cinque Terre" width="30" height="30"> {{ Auth::user()->name }}
                            @else
                                <img src="{{ asset('user/user-icon.png') }}" class="rounded-circle" alt="Cinque Terre"
                                    width="30" height="30"> {{ Auth::user()->name }}
                            @endif
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </div>
                </li>
            @endauth
        </ul>
    </div>
</nav>
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
    <div class="offcanvas-header">
        <h1 class="offcanvas-title" id="offcanvasLefLabel">Menu</h1>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="{{ url('/') }}" class="nav-link text-dark">
                    <h5> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-tags-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 2a1 1 0 0 1 1-1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 2 6.586V2zm3.5 4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                            <path
                                d="M1.293 7.793A1 1 0 0 1 1 7.086V2a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l.043-.043-7.457-7.457z" />
                        </svg> Produk</h5>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('kategori') }}" class="nav-link text-dark">
                    <h5> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-funnel-fill" viewBox="0 0 16 16">
                            <path
                                d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                        </svg> Kategori</h5>
                </a>
            </li>
        </ul>
        <hr>
    </div>
</div>
