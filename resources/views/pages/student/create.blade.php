@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Formulario de Profesores'])
    <div class="container">
        <div class="card mb-4">
            <div class="card-header pb-0">
    
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            Crear Profesor
                        </h5>
                    </div>
                </div>            
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <form class="container mt-4" action="">
                    <div class="row">
                        
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Cedula</span>
                                <input name="code" type="text" class="form-control text-center" aria-describedby="basic-addon1" value="">
                              </div>
                        </div>

                        <div class="col-md-6">

                        </div>
                        
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Nombres</span>
                                <input name="code" type="text" class="form-control text-center" aria-describedby="basic-addon1" value="">
                              </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Apellidos</span>
                                <input name="code" type="text" class="form-control text-center" aria-describedby="basic-addon1" value="">
                              </div>
                        </div>

                       

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection