<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="/">Scanner</a>
        {{-- <a class="navbar-brand" href="/"><img src="img/sundaya_logo_putih.png" width="120"></a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                {{-- <li class="nav-item">
                    <a class="nav-link {{($title === "Home" ? 'active' : '')}}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link {{($title === "About" ? 'active' : '')}}" href="/about">About</a>
                    </li>
                    <a class="nav-link {{($title === "Posts" ? 'active' : '')}}" href="/posts">Blog</a>
                    </li>
                    <a class="nav-link {{($title === "Scan" ? 'active' : '')}}" href="/scan">Scan</a>
                    </li> --}}
                <a class="nav-link {{ $title === 'DataBatt' ? 'active' : '' }}" href="/batt_show">DataBatt</a>
                </li>
                <a class="nav-link {{ $title === 'Find BINQR' ? 'active' : '' }}" href="/searchBinPage">Find BINQR</a>
                </li>
                <a class="nav-link {{ $title === 'V&IR Update' ? 'active' : '' }}" href="/voltageUpdate">V&IR Update</a>
                </li>
                <a class="nav-link {{ $title === 'Frame Scan' ? 'active' : '' }}" href="/frameScan">Frame Scan</a>
                </li>

            </ul>
            {{-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
        </div>
    </div>
</nav>
