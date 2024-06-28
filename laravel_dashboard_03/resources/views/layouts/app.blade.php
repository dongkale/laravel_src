<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">

    <!-- 부트스트랩 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>

    <!-- 부트스트랩 JS 및 기타 스크립트 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Style CSS -->
    <link href="{{ mix('/css/styles.css') }}" rel="stylesheet">

    <!-- Scripts -->
    {{-- <script type="text/javascript" src="{{mix('/js/app.js')}}"></script> --}}

    <style>
        /* .row.content {height: 550px}
        .sidebar {
            background-color: #f1f1f1;
            height: 100%;
            min-height: 100vh;
        }
        @media screen and (max-width: 767px) {
            .row.content {height: auto;}
        } */        
        /* 버튼 스타일 */
        /* .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        } */
    </style>
</head>
<body>

@php
function getMainState($mainMenu, $code, $rv = "") {    
    return ($mainMenu == $code) ? $rv : "";
}

function getSubState($subMenu, $code, $rv = "") {    
    return ($subMenu == $code) ? $rv : "";
}

$mainMenu = isset($mainMenuCode) ? $mainMenuCode : "";
$subMenu = isset($subMenuCode) ? $subMenuCode : "";
@endphp

@include('partials.header')

<main role="main">
    <!-- 사이드바와 콘텐츠 영역 -->
    <article class="d-flex">
        <!-- 사이드바 -->
        <aside>
            <!-- 여기에 사이드바 메뉴를 생성하는 Blade 코드를 추가할 수 있습니다. -->
            @include('partials.sidebar')
        </aside>
        <!-- 콘텐츠 영역 -->
        <article class="col content container-fluid mt-1 py-3">
            <!-- 여기에 콘텐츠를 추가할 수 있습니다. -->
            <section>
                @yield('content')
            </section>
        </article>
    </article>
</main>

<script>

$(document).ready( function() {    
});

// function checkTouchable() {
//   document.body.dataset.touchable = !!window.ontouchstart;
// }

// checkTouchable();

$('#body-row .collapse').collapse('hide'); 

// Collapse/Expand icon
$('#collapse-icon').addClass('fa-angle-double-left'); 

// Collapse click
$('[data-toggle=sidebar-colapse]').click(function() {
    sidebarCollapse();
});

function sidebarCollapse () {
    $('.menu-collapsed').toggleClass('d-none');
    $('.sidebar-submenu').toggleClass('d-none');
    $('.submenu-icon').toggleClass('d-none');
    $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');

    // 메인 콘텐츠의 margin-left 조정
    if ($('#sidebar-container').hasClass('sidebar-collapsed')) {
        $('.col').css('margin-left', '60px'); // 사이드바 접힘 너비에 맞춤        
    } else {
        $('.col').css('margin-left', '230px'); // 원래 사이드바 너비에 맞춤        
    }
    
    // Treating d-flex/d-none on separators with title
    var separatorTitle = $('.sidebar-separator-title');
    if ( separatorTitle.hasClass('d-flex') ) {
        separatorTitle.removeClass('d-flex');
    } else {
        separatorTitle.addClass('d-flex');
    }
    
    // Collapse/Expand icon
    $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
}

$('.collapse').on('show.bs.collapse', function() {
    $(this).slideDown(200);

    // var __v = $(this).prop("class");;
    // console.log($(this).prop("class"););

    // $('.sidebar-submenu').not(this).each(function(){
    //     var that = $(this);
    //     // console.log(that.attr('href'));
    //     // that.removeClass('show');
    //     // console.log($(this).prop("class"));
    //     console.log($(this).prop("id"));
    //     that.removeClass('show');

    //     // 서브 메뉴도 닫기
    //     $(this).find('.collapse').each(function(){
    //         var that = $(this);
    //         that.removeClass('select');
    //     });        
    // });

    // closeSubMenu();

    // console.log($(this).prop("class"));
    // console.log('show');

}).on('hide.bs.collapse', function() {
    $(this).slideUp(200);

    // console.log($(this).prop("class"));
    // console.log('hide');

    // var __v = $(this).prop("class");;
    // console.log(__v);
});

$('.list-group-item').click(function(){
    // 현재 클릭한 서브 메뉴의 id 가져오기
    // var submenu = $(this).attr('href');

    // console.log(submenu);
    
    // 현재 클릭한 서브 메뉴를 제외한 다른 서브 메뉴 닫기
    // $('.collapse').not(submenu).collapse('hide');

    var submenu = $(this);

    // $('.collapse').not(submenu).collapse('hide');
});

///*
$('.list-group > a').click(function () {
    var that = $(this);
	// $('.sidebar-submenu').slideUp(200);

	// if ($(this).parent().hasClass('active')) {
	// 	$('.sidebar-dropdown').removeClass('active');
	// 	$(this).parent().removeClass('active');        
    //     console.log('show ===');
	// } else {
	// 	$('.sidebar-dropdown').removeClass('active');
	// 	$(this).next('.sidebar-submenu').slideDown(200);
	// 	$(this).parent().addClass('active');        
    //     console.log('hide ===');
	// }

    console.log(`Active: ${that.prop("id")}`);

    // $('.sidebar-submenu').slideUp(200);

	if (that.parent().hasClass('active')) {
	// 	$('.sidebar-dropdown').removeClass('active');
	 	//$(this).parent().removeClass('active');
        // $(this).parent().removeClass('show');
        //console.log('show ===');
	} else {
	// 	$('.sidebar-dropdown').removeClass('active');
	 	// that.next('.sidebar-submenu').slideDown(200);
	 	// $(this).parent().addClass('active');
        // $(this).parent().addClass('show');
        //console.log('hide ===');
	}

    $('.list-group > a.top-menu').not(that).each(function(){
        var that = $(this);
        console.log(`Inactive: ${that.prop("id")}`);
        // that.collapse('hide');

        // // 서브 메뉴도 닫기
        // $(this).find('.collapse').each(function(){
        //     var that = $(this);
        //     that.removeClass('select');
        // });        
    });

    $('.collapse').not($(this)).collapse('hide');
});
//*/
// ------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------

// function BTN_TEST() {    
//     // $('.collapse').collapse('hide');
//     // console.log("===");

//     closeSubMenu();
// }


// 서브 메뉸 닫는 함수
function closeSubMenu() {
    // $('.sidebar-submenu').each(function(){
    //     // var that = $(this);
    //     // that.removeClass('show');
    //      $('.collapse').collapse('hide');
    // });
    $('.collapse').each(function(){
        var that = $(this);
        that.collapse('hide');
        console.log("===");
    });
}

$('#topmenu').click(function(){
    // console.log(`===`);

    // 현재 클릭한 메뉴를 제외한 다른 메뉴들을 닫기
    // $('.list-group-item').not(this).each(function(){
    //     var that = $(this);
    //     console.log(that.attr('href'));
    //     that.removeClass('select');
    // });
});

</script>

</body>
</html>
