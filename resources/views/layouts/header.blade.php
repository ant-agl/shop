<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('index') }}">Интернет Магазин</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @routeactive('index')">
                    <a class="nav-link" href="{{ route('index') }}">Все товары</a>
                </li>
                <li class="nav-item @routeactive('categor*')">
                    <a class="nav-link" href="{{ route('categories') }}">Категории</a>
                </li>
                <li class="nav-item @routeactive('basket*')">
                    <a class="nav-link" href="{{ route('basket') }}">В корзину</a>
                </li class="nav-item">
                <!-- <li>
                    <a href="http://internet-shop.tmweb.ru/reset">Сбросить проект в начальное состояние</a>
                </li>
                <li>
                    <a href="http://internet-shop.tmweb.ru/locale/en">en</a>
                </li> -->

                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        ₽
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="http://internet-shop.tmweb.ru/currency/RUB">₽</a>
                        </li>
                        <li>
                            <a href="http://internet-shop.tmweb.ru/currency/USD">$</a>
                        </li>
                        <li>
                            <a href="http://internet-shop.tmweb.ru/currency/EUR">€</a>
                        </li>
                    </ul>
                </li> -->
            </ul>

            <ul class="navbar-nav">
                @guest
                <li class="nav-item @routeactive('login')">
                    <a class="nav-link" href="{{ route('login') }}">Войти</a>
                </li>
                <li class="nav-item @routeactive('register')">
                    <a class="nav-link" href="{{ route('register') }}">Зарегестрироваться</a>
                </li>
                @endguest
                @auth
                @admin
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.order') }}">Админка</a>
                </li>
                @endadmin
                <li class="nav-item mr-4 @routeactive('person.order*')">
                    <a class="nav-link" href="{{ route('person.order') }}">Мои заказы</a>
                </li>
                <li class="nav-item dropdown">
                    <span class="navbar-text dropdown-toggle" role="button" id="navbarUser" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</span>
                    <div class="dropdown-menu" aria-labelledby="navbarUser">
                        <a class="dropdown-item" href="{{ route('logout') }}">Выйти</a>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
