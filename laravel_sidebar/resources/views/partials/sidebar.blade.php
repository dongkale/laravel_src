<!-- Sidebar  -->
<nav id="sidebar" class="sticky-top">
    <div class="sidebar-header">
        <h3>LENNON</h3>
    </div>
    <ul class="list-unstyled components">
        <p><a href="{{ url('/') }}"> Dashboard</a></p>
        <li>
            <a href="#menu1Submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Menu1</a>
            <ul class="collapse list-unstyled {{getMainState($mainMenu, 'Menu1', 'show') }}" id="menu1Submenu">
                <li>
                    <a class="subMenu {{getSubState($subMenu, 'Menu1_1', 'active') }}" href="{{ url('/Menu1_1') }}">
                        <div>Menu1-1</div>
                    </a>
                </li>
                <li>
                    <a class="subMenu {{getSubState($subMenu, 'Menu1_2', 'active') }}" href="{{ url('/Menu1_2') }}">
                        <div>Menu1-2</div>
                    </a>
                </li>
                <li>
                    <a class="subMenu {{getSubState($subMenu, 'Menu1_3', 'active') }}" href="{{ url('/Menu1_3') }}">
                        <div>Menu1-3</div>
                    </a>
                </li>
            </ul>
        </li>        
        <li>
            <a href="#menu2Submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Menu2</a>
            <ul class="collapse list-unstyled {{getMainState($mainMenu, 'Menu2', 'show') }}" id="menu2Submenu">
                <li>
                    <a class="subMenu {{getSubState($subMenu, 'Menu2_1', 'active') }}" href="{{ url('/Menu2_1') }}">
                        <div>Menu2-1</div>
                    </a>
                </li>
                <li>
                    <a class="subMenu {{getSubState($subMenu, 'Menu2_2', 'active') }}" href="{{ url('/Menu2_2') }}">
                        <div>Menu2-1</div>
                    </a>
                </li>
                <li>
                    <a class="subMenu {{getSubState($subMenu, 'Menu2_3', 'active') }}" href="{{ url('/Menu2_3') }}">
                        <div>Menu2-1</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#">About</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li>
    </ul>    
</nav>