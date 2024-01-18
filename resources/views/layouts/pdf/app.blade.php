<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('header')</title>
</head>
<body>
    <style>
        table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin: 0;
  padding: 0;
  width: 100%;
  table-layout: fixed;
}

table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}

table tr {
  background-color: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}

table th,
table td {
  padding: .625em;
  text-align: center;
  font-size: 11px;
}

table th {
  font-size: 12px;
  text-transform: uppercase;
}

/* general styling */
body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}

.bg-n-green-suave{
    background-color: #ddefde;
}

.bg-n-green-fuerte{
    background-color: #bbeebe;
}

.bg-n-danger{
    background-color: #ef84a1;
}

.bg-n-success{
    background-color: #3af66c;
}

.font-14{
    font-size: 12px;
}
.content-header{
    width: 100%;
}
.content-header div{
    display: inline;
}
.bg-n-gray{
    background-color: #ccc;
}
    </style>

    <header>
        <div class="content-header">
            <div>
                <img style="width: 80px" src="img/intesa.png" alt="">
            </div>
        </div>
    </header>
    @yield('content')
</body>
</html>