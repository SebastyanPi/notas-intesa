@php
     $URL = env('APP_URL');
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

<body class="">

    @auth
        <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary bg-white">
            <div class="container-fluid">
            <img src="{{ $URL }}/img/intesa.png" alt="Logo" width="50" height="50" class="d-inline-block align-text-top ">
            <a class="navbar-brand ml-4" href="#"><b>Intesa - Notas</b></a>
            
            <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                </ul>

                <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="nav-link  font-weight-bold px-0">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="d-sm-inline d-none">Salir</span>
                    </a>
                </form>
            </div>
            </div>
        </nav>

        @yield('content')
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
    @stack('js')
</body>

</html>
