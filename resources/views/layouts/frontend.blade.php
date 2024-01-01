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

    {{-- Alert Toastre --}}
    {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"> --}}

    @yield('css_before')
    <link rel="stylesheet" href="css/app.css">
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

                    <a class="nav-link" href="{{ url('/products') }}">สินค้า</a>

                    <a class="nav-link" href="{{ url('/aboute') }}">เกี่ยวกับเรา</a>

                </div>
            </div>
        </div>
    </nav>
    <div class="container py-4">
        @yield('content')
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

{{-- Alert Toastre --}}
{{-- <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}
{{-- @if (Session::has('success'))
    <script>
        toastr.success(('{{ Session::get('success') }}'))
    </script>
@endif --}}

{{-- Alert Sweet --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (Session::has('success'))
    <script>
        Swal.fire({
            title: "แจ้งเตือนทำรายการ",
            text: "บันทึกข้อมูลเรียบร้อย",
            icon: "success"
        });
    </script>
@elseif (Session::has('error'))
    <script>
        Swal.fire({
            title: "แจ้งเตือนทำรายการ",
            text: "ลบข้อมูลเรียบร้อย",
            icon: "error"
        });
    </script>
@endif --}}

@yield('js_before')

</html>
