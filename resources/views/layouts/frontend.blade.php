<!doctype html>
<html lang="{{ config('app.locale') }}">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Name - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @yield('css_before')
</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top bg-body-tertiary" aria-label="Main navigation">
        <div class="container-fluid">
            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home Page</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">

                    <a class="nav-link" href="{{ url('/') }}">หน้าหลัก</a>

                    <a class="nav-link" href="{{ url('/posts') }}">บทความ</a>

                    <a class="nav-link" href="{{ url('/category') }}">ประเภทบทความ</a>

                    <a class="nav-link" href="{{url('/products')}}">สินค้า</a>
                    
                    <a class="nav-link" href="{{ url('/aboute') }}">เกี่ยวกับเรา</a>

                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
@yield('js_before')

</html>
