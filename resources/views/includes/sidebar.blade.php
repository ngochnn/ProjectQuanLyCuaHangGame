<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('images/icon/logo.png') }}" alt="CoolAdmin" />

        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="/">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="index.html">Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index2.html">Dashboard 2</a>
                        </li>
                        <li>
                            <a href="index3.html">Dashboard 3</a>
                        </li>
                        <li>
                            <a href="index4.html">Dashboard 4</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/users">
                        <i class="fa fa-user"></i>User management</a>
                </li>
                <li>
                    <a href="/products">
                        <i class="fa fa-gamepad"></i>Product management</a>
                </li>
                <li>
                    <a href="/articles">
                        <i class="fa fa-th-large"></i>Article management</a>
                </li>
                <hr />
                <li>
                    @guest
                    @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-lock"></i> {{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-lock"></i> {{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <i class="fa fa-user"></i> {{ Auth::user()->name }}

                </li>
                <li class="nav-item dropdown">
                    <a href="/home">Logout</a>
                @endguest
                </li>

                <x-package-alert type="danger" message="demo component" />
            </ul>
        </nav>
    </div>
</aside>