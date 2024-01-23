@extends('layouts.app')

@section('content')
<div class="container position-sticky z-index-sticky top-0 d-none">
    <div class="row">
        <div class="col-12">
            @include('layouts.navbars.guest.navbar')
        </div>
    </div>
</div>
<main class="main-content  mt-0" style="display: none">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">

                    <div class="d-flex justify-content-center align-item-center">
                        <div class="">
                            Hola
                            <input type="text">
                        </div>
                    </div>
                <div class="">
                    <div class="W-50">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-center">
                                <h1 class="font-weight-bolder">INTESA</h1>
                                <small>Plataforma Institucional</small>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="">
                                    @csrf
                                    @method('post')
                                    <div class="flex flex-col mb-3">
                                        <input type="email" name="email" class="input-n" value="{{ old('email') ?? 'admin@argon.com' }}" aria-label="Email">
                                        @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                    <div class="flex flex-col mb-1">
                                        <input type="password" name="password" class="input-n" aria-label="Password" value="secret" >
                                        @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                    
                                    <div class="form-check form-switch d-none">
                                        <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn-n btn-n-primary w-100"> Iniciar Sesión</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
</main>


<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
    <div class="col-12">
    <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
    <div class="col-12">
    
    <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
    <div class="container-fluid">
    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="https://argon-dashboard-laravel.creative-tim.com/dashboard">
    Instituto Tecnico Del Saber 
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon mt-2">
    <span class="navbar-toggler-bar bar1"></span>
    <span class="navbar-toggler-bar bar2"></span>
    <span class="navbar-toggler-bar bar3"></span>
    </span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
    <ul class="navbar-nav mx-auto">
    <li class="nav-item d-none">
    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="https://argon-dashboard-laravel.creative-tim.com/dashboard">
    <i class="fa fa-chart-pie opacity-6 text-dark me-1" aria-hidden="true"></i>
    Dashboard
    </a>
    </li>
    <li class="nav-item d-none">
    <a class="nav-link me-2" href="https://argon-dashboard-laravel.creative-tim.com/register">
    <i class="fas fa-user-circle opacity-6 text-dark me-1" aria-hidden="true"></i>
    Sign Up
    </a>
    </li>
    <li class="nav-item d-none">
    <a class="nav-link me-2" href="https://argon-dashboard-laravel.creative-tim.com/login">
    <i class="fas fa-key opacity-6 text-dark me-1" aria-hidden="true"></i>
    Sign In
    </a>
    </li>
    </ul>
    <ul class="navbar-nav d-lg-block d-none">
    <li class="nav-item">
    <a href="https://www.creative-tim.com/product/argon-dashboard-laravel" target="_blank" class="btn btn-sm mb-0 me-1 btn-primary"><i class="fab fa-whatsapp"></i> Contactar</a>
    </li>
    </ul>
    </div>
    </div>
    </nav>
    
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


    <main class="main-content mt-0 ps">
        <section>
        <div class="page-header min-vh-100">
        <div class="container">
        <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
        <div class="card card-plain">
        <div class="card-header pb-0 ">
            
        <h4 class="font-weight-bolder d-none">Sign In</h4>
        <p class="mb-0 d-none">Iniciar Sesión</p>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center align-item-center mb-3">
                <img src="img/intesa.png" class="w-50 text-center " alt="">
            </div>
        <form role="form" method="POST" action="{{ route('login.perform') }}">
            @csrf
            @method('post')
            <div class="flex flex-col mb-1">
        <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') ?? 'admin@argon.com' }}" aria-label="Email">
        @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
        </div>
        <div class="flex flex-col mb-1">
        <input type="password" name="password" class="form-control form-control-lg" aria-label="Password" value="secret">
        @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
        </div>
        <div class="flex flex-col mb-1">
            <select name="role" id="" class="form-control">
                <option value="Estudiante">Rol Estudiante</option>
                <option value="Profesor">Rol Profesor</option>
                <option value="Administrador">Rol Administrador</option>
            </select>

            @error('warning') <p class="text-danger text-xs pt-1" > {{$message}} </p>@enderror
        </div>
        <div class="form-check form-switch d-none">
        <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
        <label class="form-check-label " for="rememberMe">Remember me</label>
        </div>
        <div class="text-center">
        <button type="submit" class="btn-n btn-lg btn-n-orange btn-lg w-100 mt-4 mb-0">Iniciar Sesion <i class="fas fa-sign-in-alt ml-2"></i></button>
        </div>
        </form>
        </div>
        <div class="card-footer text-center pt-0 px-lg-2 px-1">
        <p class="mb-1 text-sm mx-auto d-none">
        Forgot you password? Reset your password
        <a href="https://argon-dashboard-laravel.creative-tim.com/reset-password" class="text-primary text-gradient font-weight-bold">here</a>
        </p>
        </div>
        <div class="card-footer text-center pt-0 px-lg-2 px-1">
        <p class="mb-4 text-sm mx-auto d-none">
        Don't have an account?
        <a href="https://argon-dashboard-laravel.creative-tim.com/register" class="text-primary text-gradient font-weight-bold">Sign up</a>
        </p>
        </div>
        </div>
        </div>
        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
        <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('{{ env('APP_URL') }}img/intesae1.jfif');
                      background-size: cover;">
        <span class="mask bg-gradient-primary opacity-1"></span>
        <h4 class="mt-5 text-white font-weight-bolder position-relative">Egresada</h4>
        <p class="text-white position-relative"> <small>
            La excelencia académica es un aspecto crucial para que nuestros estudiantes tengan una experiencia educativa positiva y obtengan un aprendizaje significativo.    
        </small></p>
        </div>
        </div>
        </div>
        </div>
        </div>
        </section>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></main>



@endsection
