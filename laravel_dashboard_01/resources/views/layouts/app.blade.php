<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Style CSS -->
    <link href="{{ mix('/css/styles.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- 부트스트랩 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet" />

    {{-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script> --}}

    <!-- 부트스트랩 JS 및 기타 스크립트 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


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
        .card {
            margin-bottom: 20px;
            padding: 15px;
            /* padding-left: 15px;
            padding-right: 15px; */
        }        
    </style>
</head>
<body>

@php
function getMainState($mainMenu, $code, $rv = "") {
    $v = "";
    if( $mainMenu == $code ) {
        $v = $rv;
    }
    return $v;
}
function getSubState($subMenu, $code, $rv = "") {
    $v = "";
    if( $subMenu == $code ) {
        $v = $rv;
    }
    return $v;
}
$mainMenu = isset($mainMenuCode) ? $mainMenuCode : "";
$subMenu = isset($subMenuCode) ? $subMenuCode : "";
@endphp

@include('partials.header')

<div class="page-wrapper chiller-theme toggled">
	<a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
		<i class="fas fa-bars"></i>
	</a>
     
    <!-- 여기에 사이드바 메뉴를 생성하는 Blade 코드를 추가할 수 있습니다. -->
    @include('partials.sidebar')
    
    <!-- 콘텐츠 영역 -->
    <main class="page-content">
		<div class="container-fluid">
            <h2>Pro Sidebar</h2>
			<hr />			
            
            <section>
                @yield('content')
            </section>
            
            <hr />

			<footer class="text-center">
				<div class="mb-2">
					<small>
						© 2020 made with <i class="fa fa-heart" style="color: red"></i> by -
						<a target="_blank" rel="noopener noreferrer" href="https://azouaoui.netlify.com">
							Mohamed Azouaoui
						</a>
					</small>
				</div>
				<div>
					<a href="https://github.com/azouaoui-med" target="_blank">
						<img
							alt="GitHub followers"
							src="https://img.shields.io/github/followers/azouaoui-med?label=github&style=social" />
					</a>
					<a href="https://twitter.com/azouaoui_med" target="_blank">
						<img
							alt="Twitter Follow"
							src="https://img.shields.io/twitter/follow/azouaoui_med?label=twitter&style=social" />
					</a>
				</div>
			</footer>
        </div>
    </main>
</div>    

<script>

$(document).ready( function() {
    // 서브 메뉴 클릭 이벤트
    $('.sidebar-submenu a').on('click', function() {
        var submenuId = $(this).data('submenu-id'); // 서브 메뉴 ID 가져오기
        localStorage.setItem('selectedSubmenu', submenuId); // 로컬 스토리지에 저장
    });

    // 페이지 로드 시 선택된 서브 메뉴 확인
    var selectedSubmenu = localStorage.getItem('selectedSubmenu');
    if (selectedSubmenu) {
        $('[data-submenu-id="' + selectedSubmenu + '"]').addClass('active'); // 해당 서브 메뉴 활성화

        // 해당하는 서브 메뉴의 부모 메뉴 확장 로직 추가 가능
        // $('[data-submenu-id="' + selectedSubmenu + '"]').closest('.sidebar-dropdown').addClass('active');
        $('[data-submenu-id="' + selectedSubmenu + '"]').closest('.sidebar-submenu').show();
    }
});

function selectMenu() {
    var url = window.location.href;
    var activePage = url;

    $('.list-group li').each(function () {        
        var findit = $(this).find('a'); // $(this).find('ul li a');

        var linkPage = findit.attr('href');
        // console.log(`linkPage ==> ${linkPage}`);
        
        if (activePage == linkPage) {            
            // findit.closest('.collapse').addClass('show'); // 부모 collapse 항목 펼치기
            findit.addClass('active');
            console.log(`activePage ==> ${linkPage}`);
        } else {            
            findit.removeClass('active');
        }
    });
}


$(function ($) {
	$('.sidebar-dropdown > a').click(function () {
		$('.sidebar-submenu').slideUp(200);
		if ($(this).parent().hasClass('active')) {
			$('.sidebar-dropdown').removeClass('active');
			$(this).parent().removeClass('active');
		} else {
			$('.sidebar-dropdown').removeClass('active');
			$(this).next('.sidebar-submenu').slideDown(200);
			$(this).parent().addClass('active');
		}
	});
	$('#close-sidebar').click(function () {
		$('.page-wrapper').removeClass('toggled');
	});
	$('#show-sidebar').click(function () {
		$('.page-wrapper').addClass('toggled');
	});
});




</script>

</body>
</html>
