@php
    $URL = env('APP_URL');
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./img/intesa.png">
    <link rel="icon" type="image/png" href="{{ env('APP_URL') }}img/intesa.png">
    <title>
        Campus Virtual  - INTESA
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ env('APP_URL') }}assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="{{ env('APP_URL') }}assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ env('APP_URL') }}assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ env('APP_URL') }}assets/css/argon-dashboard.css" rel="stylesheet" />
    <link id="pagestyle" href="{{ env('APP_URL') }}assets/css/app.css" rel="stylesheet" />
    <meta property="og:image" content="{{ $URL }}img/intesa.png">
    <meta name="description" content="Campus Virtual INTESA - Institución tecnico laboral para el trabajo y el desarrollo humano." >
    @notifyCss
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    @livewireStyles
</head>

<body class="{{ $class ?? '' }}">

    @guest
        @yield('content')
    @endguest

    @auth
        @if (in_array(request()->route()->getName(), ['sign-in-static', 'sign-up-static', 'login', 'register', 'recover-password', 'rtl', 'virtual-reality']))
            @yield('content')
        @else
            @if (!in_array(request()->route()->getName(), ['profile', 'profile-static', 'module.index','program.index','program.show', 'schedule.index' ,'group.add']))
                <div class="min-height-200 bg-primary position-absolute w-100"></div>
            @elseif (in_array(request()->route()->getName(), ['profile-static', 'profile','module.index','program.index','program.show','schedule.index' ,'group.add']))
                <div class="position-absolute w-100 min-height-200 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
                    <span class="mask bg-primary opacity-6"></span>
                </div>
            @endif
            @include('layouts.navbars.auth.sidenav')
                <main class="main-content border-radius-lg">
                    @yield('content')
                </main>
            @include('components.fixed-plugin')
        @endif
    @endauth

    @livewireScripts
    
    <x-notify::notify />        
    @notifyJs
    <!--   Core JS Files   -->
    <script src="{{ env('APP_URL') }}assets/js/core/popper.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/js/core/bootstrap.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{ env('APP_URL') }}assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ env('APP_URL') }}assets/js/argon-dashboard.js"></script>
    @stack('js');
</body>

</html>
