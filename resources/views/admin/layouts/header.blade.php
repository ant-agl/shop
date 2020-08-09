<nav class="navbar navbar-expand-lg navbar-dark bg-secondary fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">Админ панель</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbar" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @routeactive('admin.categories*')">
                    <a class="nav-link" href="{{ route('admin.categories.index') }}">Категории</a>
                </li>
                <li class="nav-item @routeactive('admin.products*')">
                    <a class="nav-link" href="{{ route('admin.products.index') }}">Товары</a>
                </li>
                <li class="nav-item @routeactive('admin.order*')">
                    <a class="nav-link" href="{{ route('admin.order') }}">Заказы</a>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <span class="navbar-text dropdown-toggle" role="button" id="navbarUser" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</span>
                    <div class="dropdown-menu" aria-labelledby="navbarUser">
                        <a class="dropdown-item" href="{{ route('logout') }}">Выйти</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
