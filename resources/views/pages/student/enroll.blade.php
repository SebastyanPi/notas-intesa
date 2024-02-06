@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Matricular Estudiantes'])
    <div class="container">
        <div class="card mb-4">
            <div class="card-header pb-0">
    
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1 mb-4">
                            <i class="fas fa-graduation-cap"></i> Matricular Estudiante
                        </h5>
                        <h6>
                            <span class="badge badge-sm bg-n-orange"> Cedula</span>
                              {{ $student->nit }} <br />
                            <span class="badge badge-sm bg-n-orange"> Estudiante</span>
                              <b>{{ $student->names() }} </b><br />
                              <span class="badge badge-sm bg-n-orange"> Correo</span>
                              {{ $student->email }} <br />
                            <span class="badge badge-sm bg-n-orange"> Clave</span>
                                <div class="n-tooltip"><b><small>Contraseña</small></b>
                                <span class="n-tooltiptext">{{ $student->password_verified_at }}</span>
                              </div>
                        </h6>

                    </div>
                </div>            
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                @livewire('enroll', [ "user_id" => $student->id ])
            </div>

          
        </div>
    </div>
@endsection