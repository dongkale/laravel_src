<header>
	<nav class="navbar navbar-expand navbar-dark bg-primary">
		<a href="javascript:void(0)" class="sidebar-toggle text-light mr-3">
			<i class="fa fa-bars"></i>
		</a>
		<a href="" class="navbar-brand"> <i class="fa fa-clone"></i> Template </a>
		<div class="navbar-collapse collapse">
			<ul class="navbar-nav ml-auto">
				{{-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle"
						href="#"
						id="navbarDropdownMenuLink"
						data-toggle="dropdown">
						<i class="fa fa-user"></i> Hello, username!
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="javascript:void(0)" @click="state.peer = {}">Logout</a>
					</div>
				</li> --}}
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('로그인') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('가입') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
			</ul>
		</div>
	</nav>
</header>
