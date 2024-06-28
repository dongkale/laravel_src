<!-- Sidebar -->
<div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
    <!-- Bootstrap List Group -->
    <ul class="list-group">
        <!-- Separator with title -->
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>MAIN MENU</small>
        </li>
        <!-- /END Separator -->
        <!-- Menu with submenu -->
        <a id="topmenu1" href="#submenu1" data-toggle="collapse" aria-expanded="false" class="top-menu bg-dark list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-dashboard fa-fw mr-3"></span> 
                <span class="menu-collapsed">Dashboard</span>
                <span class="submenu-icon ml-auto"></span>
            </div>
        </a>
        <!-- Submenu content -->
        <div id='submenu1' class="collapse sidebar-submenu {{ getMainState($mainMenu, 'MENU_1', 'show') }}">
            <a href="{{ url('/Charts') }}" class="list-group-item list-group-item-action bg-dark text-white {{ getSubState($subMenu, 'Charts', 'select') }}">
                <span class="menu-collapsed">Charts</span>
            </a>
            <a href="{{ url('/Reports') }}" class="list-group-item list-group-item-action bg-dark text-white {{ getSubState($subMenu, 'Reports', 'select') }}">
                <span class="menu-collapsed">Reports</span>
            </a>
            <a href="{{ url('/Tables') }}" class="list-group-item list-group-item-action bg-dark text-white {{ getSubState($subMenu, 'Tables', 'select') }}">
                <span class="menu-collapsed">Tables</span>
            </a>
        </div>
        
        <a id="topmenu2" href="#submenu2" data-toggle="collapse" aria-expanded="false" class="top-menu bg-dark list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-user fa-fw mr-3"></span>
                <span class="menu-collapsed">Profile</span>
                <span class="submenu-icon ml-auto"></span>
            </div>
        </a>
        <!-- Submenu content -->
        <div id='submenu2' class="collapse sidebar-submenu {{ getMainState($mainMenu, 'MENU_2', 'show') }}">
            <a href="{{ url('/Setting') }}" class="list-group-item list-group-item-action bg-dark text-white {{ getSubState($subMenu, 'Setting', 'select') }}">
                <span class="menu-collapsed">Settings</span>
            </a> 
        </div>

        <a id="topmenu3" href="#submenu3" data-toggle="collapse" aria-expanded="false" class="top-menu bg-dark list-group-item list-group-item-action flex-column align-items-start">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-tasks fa-fw mr-3"></span>
                <span class="menu-collapsed">통계</span>
                <span class="submenu-icon ml-auto"></span>
            </div>
        </a>
        <div id='submenu3' class="collapse sidebar-submenu {{ getMainState($mainMenu, 'MENU_3', 'show') }}">
            <a href="{{ url('/statisticsUser') }}" class="list-group-item list-group-item-action bg-dark text-white {{ getSubState($subMenu, 'statisticsUser', 'select') }}">
                <span class="menu-collapsed">유저 통계</span>
            </a> 
        </div>

        <a href="{{ url('/tasks') }}" class="top-menu bg-dark list-group-item list-group-item-action bg-dark text-white {{ getMainState($mainMenu, 'MENU_4', 'select') }}">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-tasks fa-fw mr-3"></span>
                <span class="menu-collapsed">Tasks</span>    
            </div>
        </a>

        <!-- Separator with title -->
        <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
            <small>OPTIONS</small>
        </li>
        <!-- /END Separator -->
        <a href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-calendar fa-fw mr-3"></span>
                <span class="menu-collapsed">Calendar</span>
            </div>
        </a>
        <a href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-envelope-o fa-fw mr-3"></span>
                <span class="menu-collapsed">Messages <span class="badge badge-pill badge-primary ml-2">5</span></span>
            </div>
        </a>
        <!-- Separator without title -->
        <li class="list-group-item sidebar-separator menu-collapsed"></li>            
        <!-- /END Separator -->
        <a href="#" class="bg-dark list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span class="fa fa-question fa-fw mr-3"></span>
                <span class="menu-collapsed">Help</span>
            </div>
        </a>
        <a href="#" data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
            <div class="d-flex w-100 justify-content-start align-items-center">
                <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                <span id="collapse-text" class="menu-collapsed">Collapse</span>
            </div>
        </a>
        <!-- Logo -->
        {{-- <li class="list-group-item logo-separator d-flex justify-content-center">
            <img src='https://v4-alpha.getbootstrap.com/assets/brand/bootstrap-solid.svg' width="30" height="30" />    
        </li>    --}}        
    </ul><!-- List Group END-->
</div><!-- sidebar-container END -->