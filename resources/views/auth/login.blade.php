@extends('layouts.app')

@section('content')
<div class="container position-sticky z-index-sticky top-0 d-none">
    <div class="row">
        <div class="col-12">
            @include('layouts.navbars.guest.navbar')
        </div>
    </div>
</div>

<div class="container-fluid position-sticky z-index-sticky top-0">
    <div class="row">
    <div class="col-12">
    <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
    <div class="col-12">
    
    <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
    <div class="container-fluid">
    <a href="https://institutointesa.edu.co/" class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="">
    INTESA
    </a>
    <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon mt-2">
    <span class="navbar-toggler-bar bar1"></span>
    <span class="navbar-toggler-bar bar2"></span>
    <span class="navbar-toggler-bar bar3"></span>
    </span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
    <ul class="navbar-nav mx-auto ">
    <li class="nav-item d-none">
    <a class="nav-link d-flex align-items-center me-2 active d-none" aria-current="page" href="">
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
    <a href="https://institutointesa.edu.co/" target="_blank" class="btn  mb-0 me-1 btn-primary"><i class="fas fa-laptop-house"></i> Sitio Web - OFicial</a>
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
        <form role="form" method="POST" action="{{ route('login.perform') }}" id="form">
            @csrf
            @method('post')
            <div class="flex flex-col mb-1">
                <input type="number" name="cedula" class="form-control " id="cedula" placeholder="Cedula" value="{{ old('nit') ?? '' }}" aria-label="Cedula">
                
            </div>

            <div class="input-group mb-1">
                
                <input type="password" id="typep" name="password" class="form-control" aria-describedby="basic-addon1" value="" placeholder="Contraseña">
                <span class="input-group-text pointer cambpass" id="basic-addon1"><i class="far fa-eye"></i></span>
            </div>
            
        <div class="flex flex-col mb-1">
            <select name="role" id="" class="form-control">
                <option value="Estudiante">Rol Estudiante</option>
                <option value="Profesor">Rol Profesor</option>
                <option value="Administrador">Rol Administrador</option>
            </select>


            
        </div>
        <div class="form-check form-switch d-none">
        <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
        <label class="form-check-label " for="rememberMe">Remember me</label>
        </div>
        <div class="text-center">
        <button type="submit" class="btn-n btn-lg btn-n-orange btn-lg w-100 mt-4 mb-0">Iniciar Sesion <i class="fas fa-sign-in-alt ml-2"></i></button>
        @error('nit') 
            
                <div class="alert alert-dark alert-dismissible fade show text-white mt-2" role="alert">
                    <small><i class="fas fa-exclamation-triangle"></i> {{$message}}</small>
                    <button type="button" class="btn-close" style="color: #ffff; font-size:15x;" data-bs-dismiss="alert" aria-label="Close"></button> 
                </div>
                <script>
                    setTimeout(() => {
                        $(".btn-close").click();
                    }, 2000);
                </script>
                @enderror
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

        <script>
            var state = 'text';
            var figure = '<i class="fas fa-eye-slash"></i>';
            $(".cambpass").click(function(){
                $(".cambpass").html(figure);
                $("#typep").attr('type', state);
                if(state == 'password'){
                    state = 'text';
                    figure = '<i class="far fa-eye-slash"></i>';
                }else{
                    state = 'password';
                    figure = '<i class="fas fa-eye"></i>';
                }
               
            }); 


            $("#form").submit(function (e){
                if($("#typep").val() == "" || $("#cedula").val() == ""){
                    e.preventDefault();
                    
                }
            });
        </script>

@endsection
