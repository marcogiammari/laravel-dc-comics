<header class="bg-light d-flex justify-content-between align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-5 d-flex align-items-center">
                <a href="{{ route('comics.index') }}"><img id="header-logo" class="img-fluid"
                        src="{{ Vite::asset('resources/images/dc-logo.png') }}" alt="DC Logo"></a>
            </div>
            <div class="col-7 d-flex justify-content-end align-items-center">
                <ul class="d-none d-lg-flex m-0">
                    @foreach ($data['links'] as $link)
                        <li class="d-flex flex-column justify-content-center">
                            <a class="position-relative my-link d-flex align-items-center py-3"
                                href="#">{{ strtoupper($link) }}
                                <div class="position-absolute bottom-0"></div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <nav class="navbar bg-light">
                    <div class="container-fluid">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" aria-label="Search">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                    </div>
                </nav>
                <div class="d-lg-none justify-content-center align-items-center fs-1">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</header>
