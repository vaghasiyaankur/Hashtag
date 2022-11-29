<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
     {{-- custom css --}}
    @stack('css')
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        li{
            list-style: none;
        }
    </style>
</head>
<body>
    <!------- Main Url For javascript  ------->
    <input type="hidden" value="{{ URL::to('') }}" id="base_url">
    @yield('content')

    <!-- Jquery cdn -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('script')
</body>
</html>