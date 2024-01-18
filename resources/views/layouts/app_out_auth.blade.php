@php $URL = 'http://127.0.0.1:8000/'; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./img/intesa.png">
    <link rel="icon" type="image/png" href="./img/intesa.png">
    <!--<link href="@php echo $URL."assets/css/app-out/font-awesome.css" @endphp" rel="stylesheet" />
    <link href="@php echo $URL."assets/css/app-out/bootstrap.css" @endphp" rel="stylesheet" />-->
     <link href="@php echo $URL."assets/css/app-out/other.css" @endphp" rel="stylesheet" />
    <link href="@php echo $URL."assets/css/app-out/util.css" @endphp" rel="stylesheet" />
    <link href="@php echo $URL."assets/css/app-out/hamburguer.css" @endphp" rel="stylesheet" />
    <link href="@php echo $URL."assets/css/app-out/icon-font.min.css" @endphp" rel="stylesheet" />
    <link href="@php echo $URL."assets/css/app-out/animate.css" @endphp" rel="stylesheet" />
    <link href="@php echo $URL."assets/css/app-out/material-design.css" @endphp" rel="stylesheet" />
    <link id="pagestyle" href="@php echo $URL."assets/css/app-out-auth.css" @endphp" rel="stylesheet" />
    <title>INTESA - Notas</title>
</head>
<body>
    @yield('content')
</body>
</html>