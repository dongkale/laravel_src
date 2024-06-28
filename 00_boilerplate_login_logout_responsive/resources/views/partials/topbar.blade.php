<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" style="font-size:25px" href="{{ url('/dashboard') }}">Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
        @guest
            <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))
                    <li class="nav-item selector">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('로그인') }}</a>
                    </li>
                @endif
                @if (Route::has('register'))
                    <li class="nav-item selector">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('가입') }}</a>
                    </li>
                @endif
            </ul>
        @else
            <ul class="navbar-nav mr-auto">
                <li class="nav-item selector">
                    <div class="d-flex align-items-center">
                        <span class="fa fa-home mr-1 ml-2"></span>
                        <a class="nav-link" href="{{ url('/dashboard') }}" data-menu="dashboard">홈</a>
                    </div>
                </li>

                <li class="nav-item selector">
                    <div class="d-flex align-items-center">
                        <span class="fa fa-bars mr-1 ml-2"></span>
                        <a class="nav-link" href="{{ url('/dashboard/menu_1') }}" data-menu="menu_1" style="font-size:20px">메뉴 1</a>
                    </div>
                </li>
                <li class="nav-item selector">
                    <div class="d-flex align-items-center">
                        <span class="fa fa-bars mr-1 ml-2"></span>
                        <a class="nav-link" href="{{ url('/dashboard/menu_2') }}" data-menu="menu_2" style="font-size:20px">메뉴 2</a>
                    </div>
                </li>
                <li class="nav-item selector">
                    <div class="d-flex align-items-center">
                        <span class="fa fa-bars mr-1 ml-2"></span>
                        <a class="nav-link" href="{{ url('/dashboard/setting') }}" data-menu="setting" style="font-size:20px">설정</a>
                    </div>
                </li>
            </ul>

            <hr class="d-lg-none" />

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="dropdown">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </button>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('로그아웃') }}
                            </a>
                        </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                    </div>
                </li>
            </ul>
        @endguest
    </div>
</nav>
