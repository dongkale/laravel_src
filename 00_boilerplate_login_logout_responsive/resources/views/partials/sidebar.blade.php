<nav class="col-md-2 d-md-block sidebar collapse mt-3" id="sidebarMenu">
    <div class="sidebar-sticky">
        <ul class="nav flex-column list-group">
            <li class="nav-item selector">
                <div class="d-flex align-items-center">
                    <span class="fa fa-home mr-1 ml-2"></span>
                    <a class="nav-link" href="{{ url('/dashboard') }}" data-menu="dashboard">홈</a>
                </div>
            </li>

            @if(Auth::user())
                @if (Route::has('login'))
                    <li class="nav-item selector">
                        <div class="d-flex align-items-center">
                            <span class="fa fa-bars mr-1 ml-2"></span>
                            <a class="nav-link" href="{{ url('/dashboard/menu_1') }}" data-menu="menu_1">메뉴 1</a>
                        </div>
                    </li>
                    <li class="nav-item selector">
                        <div class="d-flex align-items-center">
                            <span class="fa fa-bars mr-1 ml-2"></span>
                            <a class="nav-link" href="{{ url('/dashboard/menu_2') }}" data-menu="menu_2">메뉴 2</a>
                        </div>
                    </li>
                    <li class="nav-item selector">
                        <div class="d-flex align-items-center">
                            <span class="fa fa-bars mr-1 ml-2"></span>
                            <a class="nav-link" href="{{ url('/dashboard/setting') }}" data-menu="setting">설정</a>
                        </div>
                    </li>
                @endif
            @endif

        </ul>
    </div>
</nav>

<script>

$(document).ready( function() {
    settingMenu();

    selectMenu();
} );

function settingMenu() {
    $('.list-group li').click(function(e) {
        // e.preventDefault()

        $that = $(this);

        $that.parent().find('li').removeClass('active');
        $that.addClass('active');
    });
}

function selectMenu() {
    var url = window.location.href;
    var activePage = url;

    $('.list-group li').each(function () {
        var findit = $(this).find('a'); // $(this).find('ul li a');

        var linkPage = findit.attr('href');

        if (activePage == linkPage) {
            // findit.closest('.collapse').addClass('show'); // 부모 collapse 항목 펼치기
            // findit.closest('.collapse').collapse('show');

            //findit.closest('.collapse').collapse('show');
            findit.parent().addClass('active');
            findit.addClass('active');

            console.log(`activePage ==> ${linkPage}`);
            // findit.parent().addClass('active');
        } else {
            findit.parent().removeClass('active');
            findit.removeClass('active');
            // findit.parent().collapse('hide');

            // findit.parent().removeClass('active');
            // findit.parent().collapse('hide');
        }
    });
}

// 서브메뉴 펼쳐질때 부드럽게 펼쳐지도록 설정
$('.collapse').on('show.bs.collapse', function() {
    $(this).slideDown(200);
    console.log(`show`);
    // $('.collapse').not($(this)).collapse('hide');
}).on('hide.bs.collapse', function() {
    $(this).slideUp(200);
    console.log(`hide`);
});

// 선택된 메뉴만 펼쳐기
$('a.top-menu').click(function () {
    $('.collapse').not($(this)).collapse('hide');
});

</script>
