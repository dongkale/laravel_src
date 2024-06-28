<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>@yield('title', 'Your Site Title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">    
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Custom CSS -->

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"></script>    

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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

<div class="wrapper">
    @include('partials.sidebar') <!-- 사이드바 포함 -->

    <!-- Page Content  -->
    <div id="content">
        @include('partials.header') <!-- 헤더 포함 -->
        @yield('content') <!-- 페이지별 콘텐츠가 들어갈 부분 -->
    </div>
</div>

{{-- <script src="{{ asset('js/main.js') }}"></script> <!-- Custom JS --> --}}
<script>
// $(document).ready(function () {
//     // 현재 URL에서 페이지 이름 가져오기
//     var path = window.location.pathname;
//     path = path.replace(/\/$/, "");
//     path = decodeURIComponent(path);

//     // 현재 URL에 해당하는 메뉴에 'active' 클래스 추가
//     $('#sidebar ul.components a').each(function () {
//         var href = $(this).attr('href');
//         if (path === href) {
//             $(this).addClass('active');
//             $(this).closest('.collapse').addClass('show'); // 활성 메뉴의 부모 서브 메뉴도 확장
//             $(this).parents('li').addClass('active'); // 활성 메뉴의 부모 메뉴도 활성화
//         }
//     });
// });
//  $(document).ready(function () {
//     $("#sidebar").mCustomScrollbar({
//         theme: "minimal"
//     });

//     $('#dismiss, .overlay').on('click', function () {
//         // hide sidebar
//         $('#sidebar').removeClass('active');
//         // hide overlay
//         $('.overlay').removeClass('active');
//     });

//     $('#sidebarCollapse').on('click', function () {
//         // open sidebar
//         $('#sidebar').addClass('active');
//         // fade in the overlay
//         $('.overlay').addClass('active');
//         $('.collapse.in').toggleClass('in');
//         $('a[aria-expanded=true]').attr('aria-expanded', 'false');
//     });
// });
</script>

</body>
</html>
