@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Usuarios'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
            
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    Usuarios
                                </h5>
                                <small>En esta Sección puedes editar y añadir modulos a los programas que son ofertados en la institución.</small>
                            </div>
                        </div>
            
                        <div class="col-lg-3 col-md-4 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                            <div class="nav-wrapper position-relative end-0">
                                <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                    <li class="nav-item " >
                                        <a href="{{ route('user.register') }}" class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center">
                                            <i class="ni ni-single-02"></i>
                                            <span class="ms-2">Crear Usuario</span>
                                        </a>
                                    </li>
                                </ul>
            
                            </div>
                        </div>
            
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        @livewire("user-list")
                    </div>
                </div>
        
            </div>
        </div>
    </div>
@endsection
