<nav class="sidebar bg-dark" id="sidebar-list">
    <ul class="list-unstyled">
        <li>
            <span>Navigation</span>
        </li>
        <li class="active">
            <a href=""> Home </a>
        </li>
        <li>
            <a href="#users-collapse" data-toggle="collapse">
                <i class="fa fa-bars"></i> Social
                <i class="fa fa-angle-down pull-right"></i>
            </a>
            <ul id="users-collapse" class="list-unstyled collapse {{ getMainState($mainMenu, 'MENU_1', 'show') }}">
                <li>
                    <a class="{{ getSubState($subMenu, 'MENU_1_1', 'active') }}" href="{{ url('/menu1_1') }}"> <i class="fa fa-angle-right"></i> Menu1 </a>
                </li>
                <li>
                    <a class="{{ getSubState($subMenu, 'MENU_1_2', 'active') }}" href="{{ url('/menu1_2') }}"> <i class="fa fa-angle-right"></i> Menu2 </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#users2-collapse" data-toggle="collapse">
                <i class="fa fa-bars"></i> Mobile
                <i class="fa fa-angle-down pull-right"></i>
            </a>
            <ul id="users2-collapse" class="list-unstyled collapse">
                <li>
                    <a href="#Menu1"> <i class="fa fa-angle-right"></i> Menu1 </a>
                </li>
                <li>
                    <a href="#Menu2"> <i class="fa fa-angle-right"></i> Menu2 </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#users3-collapse" data-toggle="collapse">
                <i class="fa fa-bars"></i> Mail
                <i class="fa fa-angle-down pull-right"></i>
            </a>
            <ul id="users3-collapse" class="list-unstyled collapse">
                <li>
                    <a href="#Menu1"> <i class="fa fa-angle-right"></i> Menu1 </a>
                </li>
                <li>
                    <a href="#Menu2"> <i class="fa fa-angle-right"></i> Menu2 </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
