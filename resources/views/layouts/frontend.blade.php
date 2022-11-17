<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    {{-- bootstrap core css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    {{-- material design bootstrap --}}
    <link rel="stylesheet" href="{{ asset('/assets/css/mdb.min.css') }}">
    {{-- your custom style --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title> @yield('title') | fabcart</title>
</head>

<body>
    {{-- include navbar --}}
    @include('layouts.inc.front-navbar')

    <main>
        @yield('content')
    </main>

    @include('layouts.inc.front-footer')

    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/mdb.min.js') }}"></script>
    <!-- Plugin file -->
    <script src="./js/addons/datatables.min.js"></script>
</body>

</html>
