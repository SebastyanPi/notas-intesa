@php
    $URL = 'http://127.0.0.1:8000/';
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./img/intesa.png">
    <link rel="icon" type="image/png" href="./img/intesa.png">
    <title>
        Intesa - Notas
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="@php echo $URL."assets/css/nucleo-icons.css" @endphp" rel="stylesheet" />
    <link href="@php echo $URL."assets/css/nucleo-svg.css" @endphp " rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="@php echo $URL."assets/css/argon-dashboard.css" @endphp" rel="stylesheet" />
    <link id="pagestyle" href="@php echo $URL."assets/css/app.css" @endphp" rel="stylesheet" />
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
    <script src="@php echo $URL."assets/js/core/popper.min.js"@endphp"></script>
    <script src="@php echo $URL."assets/js/core/bootstrap.min.js"@endphp"></script>
    <script src="@php echo $URL."assets/js/plugins/perfect-scrollbar.min.js"@endphp"></script>
    <script src="@php echo $URL."assets/js/plugins/smooth-scrollbar.min.js"@endphp"></script>
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
    <script src="assets/js/argon-dashboard.js"></script>
    @stack('js');
</body>

</html>
