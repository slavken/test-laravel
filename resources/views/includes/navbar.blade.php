<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('main') }}">Logo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('main') }}">Главная страница</a>
                </li>
                <li class="nav-item {{ Request::is('articles*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('articles.index') }}">Каталог статей</a>
                </li>
            </ul>
        </div>
    </div>
</nav>