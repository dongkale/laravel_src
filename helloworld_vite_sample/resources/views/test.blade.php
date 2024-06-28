 <!doctype html>
<head>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="{{ asset('build/js/util.js') }}"></script>
    <script src="{{ asset('build/js/util2.js') }}"></script>
        
</head>

<body>
    <h1>Hello, {{ $name }}</h1>
</body>

<script>
$(document).ready( function() {
    var vv1 = leftpad(12, 3);
    var vv2 = rand(1,100);

    console.log(vv1);
    console.log(vv2);    

    __test__100();
    __test__200();
    __test__201();
    __test__203();
});
</script>

</html>