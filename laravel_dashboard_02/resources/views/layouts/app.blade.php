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
        .card {
            margin-bottom: 20px;
            padding: 15px;
            /* padding-left: 15px;
            padding-right: 15px; */
        }
        /* 버튼 스타일 */
        .btn-primary {
            background-color: #007bff; /* 파란색 */
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* 파란색 (hover 시) */
            border-color: #0056b3;
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

<main role="main">
    <!-- 사이드바와 콘텐츠 영역 -->
    <article class="d-flex">
        <!-- 사이드바 -->
        <aside>
            <!-- 여기에 사이드바 메뉴를 생성하는 Blade 코드를 추가할 수 있습니다. -->
            @include('partials.sidebar')
        </aside>
        <!-- 콘텐츠 영역 -->
        <article class="content container-fluid mt-1 py-4">
            <!-- 여기에 콘텐츠를 추가할 수 있습니다. -->
            <section>
                @yield('content')
            </section>
        </article>
    </article>
</main>

<script>

$(document).ready( function() {
    // 사이드바 메뉴 활성화
    // selectMenu();
});

function selectMenu() {
    var url = window.location.href;
    var activePage = url;

    //console.log(`activePage ==> ${activePage}`);

    $('.sidebar li').each(function () {
        // var $this = $(this);
        var findit = $(this).find('a'); // $(this).find('ul li a');
        var linkPage = findit.attr('href');

        //console.log(`linkPage ==> ${linkPage}`);

        if (activePage == linkPage) {
            findit.addClass('active');
            // 부모 collapse 항목 펼치기
            findit.closest('.collapse').addClass('show');
            // $this.closest('.collapse').addClass('show'); // 부모 collapse 항목 펼치기
            // $this.closest('.collapse').prev('a').removeClass('collapsed'); // collapse 제어용 a 태그의 클래스 조정
            console.log(`findPage ==> ${linkPage}`);
        } else {
            findit.removeClass('active');
            // $this.closest('.collapse').addClass('hide'); // 부모 collapse 항목 펼치기
        }
    });
}

function selectMenu__() {
    var currentPath = window.location.pathname;

    $('ul.list-unstyled a').each(function(){
        var $this = $(this);
        // 메뉴 항목의 href가 현재 경로와 일치하는지 확인
        if($this.attr('href') === currentPath){
            $this.addClass('active'); // 현재 메뉴 항목 활성화
            $this.closest('.collapse').addClass('show'); // 부모 collapse 항목 펼치기
            $this.closest('.collapse').prev('a').removeClass('collapsed'); // collapse 제어용 a 태그의 클래스 조정
        }
    });
}

$(function () {
    // 사이드바 토글 버튼 이벤트 처리
    var sidebar = $('.sidebar');
    sidebar.userSet = false;

    $('.sidebar-toggle').on('click', function () {
        sidebar.toggleClass('hidden');
        sidebar.userSet = true;
    });

    $(window).on('resize', function () {
        if (!sidebar.userSet) {
            if (document.body.clientWidth >= 768) {
                sidebar.removeClass('hidden');
            } else {
                sidebar.addClass('hidden');
            }
        }
    });


    // $('.sidebar a').on('click', function() {
    //     alert('서브 메뉴를 클릭했습니다.');
    // });

    // $('.sidebar > a').click(function () {
	// 	$('.sidebar-submenu').slideUp(200);
	// 	if ($(this).parent().hasClass('active')) {
	// 		$('.sidebar-dropdown').removeClass('active');
	// 		$(this).parent().removeClass('active');
	// 	} else {
	// 		$('.sidebar-dropdown').removeClass('active');
	// 		$(this).next('.sidebar-submenu').slideDown(200);
	// 		$(this).parent().addClass('active');
	// 	}
	// });

    // //  서브 메뉴를 클릭했을 때
    // $('.sidebar-submenu a').click(function () {
    //     // 메뉴가 활성화되어 있지 않다면
    //     if (!$(this).hasClass('active')) {
    //         // 모든 메뉴를 비활성화
    //         $('.sidebar-submenu a').removeClass('active');
    //         // 현재 메뉴만 활성화
    //         $(this).addClass('active');
    //     } else {
    //         // 현재 메뉴를 비활성화
    //         $(this).removeClass('active');
    //     }
    // });

    // // 서브 메뉴 상태 복원
    // $('.collapse').each(function() {
    //     var collapseId = $(this).attr('id');
    //     if(localStorage.getItem(collapseId) === 'true') {
    //         $(this).addClass('show');
    //     }
    // });

    // // 서브 메뉴 클릭 이벤트
    // $('[data-toggle="collapse"]').on('click', function() {
    //     var target = $(this).attr('href').substring(1); // href에서 # 제거
    //     var isExpanded = $('#' + target).hasClass('show');
    //     // 토글된 상태 저장
    //     localStorage.setItem(target, !isExpanded);
    // });
});



// $('.collapse').on('show.bs.collapse', function() {
//     $(this).slideDown(200);
//     console.log(`show`);
// }).on('hide.bs.collapse', function() {
//     $(this).slideUp(200);
//     console.log(`hide`);
// });

// function selectMenu__() {
//     var url = window.location.href;
//     var activePage = url;

//     $('.nav-item').each(function () {
//         var findit = $(this).find('a.nav-menu').attr('href'); // $(this).find('ul li a');
//         var linkPage = findit.attr('href');
//         console.log(`linkPage ==> ${linkPage}`);

//         if (activePage == linkPage) {
//             findit.addClass('active');
//             console.log(`activePage ==> ${linkPage}`);
//         } else {
//             findit.removeClass('active');
//         }
//     });
// }

</script>

</body>
</html>
