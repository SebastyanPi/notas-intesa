@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Editar Usuarios'])

    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    <a class="text-primary" href="@if ($before == "student")
                                    {{ route('student.index') }}
                                @else
                                    {{ route('teacher.index') }}
                                @endif"><i class="ni ni-bold-left"></i><i class="ni ni-bold-left"></i></a> 
                                    Editar Usuario
                                </h5>
                                <small>En esta Sección puedes editar y añadir modulos a los programas que son ofertados en la institución.</small>
                            </div>
                        </div>
                    </div>
                    <hr>


                    @if ($errors->any())
                        <div class="alert alert-danger mt-2" id="listErrors" style="font-size: 12px">
                            <ul>
                               @error('firstname')
                                    <li class="" style="color:#fff;">
                                        - El campo (Nombre) NO puede estar vacio.
                                    </li>
                               @enderror
                               @error('lastname')
                                    <li class="" style="color:#fff;">
                                        - El campo (Apellido) NO puede estar vacio.
                                    </li>
                                @enderror
                                @error('email')
                                    <li class="" style="color:#fff;">
                                        - El campo (Email) NO puede estar vacio.
                                    </li>
                                @enderror
                            </ul>
                        </div>

                        <script>
                            setTimeout(() => {
                                document.getElementById('listErrors').remove();
                            }, 2000);
                        </script>
                    @endif


                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-body" >
                                <h5 class="mb-1">
                                    <b>Información Del Perfil </b>
                                </h5> 
                                <form class="mt-3" method="POST" action="{{ route('users.update', $user->id) }}">
                                    <div class="row">
                                        <div class="col-md-12">
                                                <input type="hidden" name="before" value="{{ $before }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Nombres</span>
                                                            <input name="firstname" type="text" class="form-control text-center" aria-describedby="basic-addon1" value="{{ $user->firstname }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Apellidos</span>
                                                            <input name="lastname" type="text" class="form-control text-center" aria-describedby="basic-addon1" value="{{ $user->lastname }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Correo</span>
                                                            <input name="email_before" type="hidden" class="form-control text-center" aria-describedby="basic-addon1" value="{{ $user->email }}">
                                                            <input name="email" readonly  type="email" class="form-control text-center" aria-describedby="basic-addon1" value="{{ $user->email }}">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <div class="n-tooltip"><b><small>Contraseña Actual</small></b>
                                                            <span class="n-tooltiptext">{{ $user->password_verified_at }}</span>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Cedula</span>
                                                            <input name="nit_before"  type="hidden" class="form-control text-center" aria-describedby="basic-addon1" value="{{ $user->nit }}">
                                                            <input name="nit" readonly type="text" class="form-control text-center" aria-describedby="basic-addon1" value="{{ $user->nit }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1">Contraseña</span>
                                                            <input name="password" type="password" class="form-control text-center" aria-describedby="basic-addon1" value="{{ $user->password_verified_at }}">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                    
                                                <div class="row">   
                                                    
                                                </div>
                    
                                                @php
                                                $roles = array();
                                                $rolesXuser = $user->getRoleNames();
                                                foreach ($rolesXuser as $key => $value) {
                                                    array_push($roles,$value);
                                                }
                                                @endphp
                    
                                                <div class="form-inline">
                                                    <small>¿El Usuario cumple el rol de <b>Estudiantes</b>?</small>
                                                    <div class="row">
                                                        <div class="col-auto mb-3 form-check ml-4">
                                                            <input
                                                            
                                                            @if (in_array('Estudiante', $roles))
                                                                checked
                                                            @endif 
                                                            
                                                            type="radio" name="estudiante" value="Si" class="form-check-input" id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">Si</label>
                                                        </div>
                                                        <div class="col-auto mb-3 form-check">
                                                            <input
                                                            
                                                            @if (!in_array('Estudiante', $roles))
                                                            checked
                                                            @endif 
                                                        
                                                            type="radio" name="estudiante" value="No" class="form-check-input" id="exampleCheck2">
                                                            <label class="form-check-label" for="exampleCheck2">No</label>
                                                        </div>
                                                    </div>
                                                   
                                  
                                                    <small>¿El Usuario cumple el rol de <b>Profesor</b>?</small>
                                                    <div class="row">
                                                        <div class="col-auto mb-3 form-check ml-4">
                                                            <input                                        
                                                            @if (in_array('Profesor', $roles))
                                                                checked
                                                            @endif                                        
                                                            type="radio" name="profesor" value="Si" class="form-check-input" id="exampleCheck3">
                                                            <label class="form-check-label" for="exampleCheck3">Si</label>
                                                        </div>
                                                        <div class="col-auto mb-3 form-check">
                                                            <input
                                                            @if (!in_array('Profesor', $roles))
                                                                checked
                                                            @endif 
                                                            type="radio" name="profesor" value="No" class="form-check-input" id="exampleCheck4">
                                                            <label class="form-check-label" for="exampleCheck4">No</label>
                                                        </div>
                                                    </div>

                                                    <small>Estado</small>
                                                    <div class="row">
                                                        <div class="col-auto mb-3 form-check ml-4">
                                                            <input                                        
                                                            @if ($user->state == "inactivo")
                                                                checked
                                                            @endif                                        
                                                            type="radio" name="state" class="form-check-input" value="inactivo" id="exampleCheck6">
                                                            <label class="form-check-label" for="exampleCheck6">Inactivo</label>
                                                        </div>
                                                        <div class="col-auto mb-3 form-check">
                                                            <input
                                                            @if ($user->state == "activo")
                                                                checked
                                                            @endif 
                                                            type="radio" name="state" class="form-check-input" value="activo" id="exampleCheck7">
                                                            <label class="form-check-label" for="exampleCheck7">Activo</label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                                <a class="btn-n btn-n-primary d-none" href="{{ route('user.list') }}"><i class="fas fa-arrow-left"></i></a>
                                                <button type="submit" class="btn-n btn-n-primary"> <i class="fas fa-save"></i> Guardar</button>
                                                <button type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn-n btn-n-danger"> <i class="fas fa-trash-alt"></i> Eliminar</button>
                                     
                                        </div>
                                       
                                    </div>
                    
                                </form>
                
                            </div>
                        </div>

       

                        <div class="col-md-5">
                        
                    
                            @if (in_array('Estudiante', $roles))
                            <div class="mt-4 mr-3">
                                <h5 class="mb-1">
                                    <b>Información Del Estudiante</b>
                                </h5>

                                @php
                                    $y = 0;
                                @endphp
                
                                @foreach ($user->group_student as $item)
                                
                                @php
                                    $y++;
                                @endphp
                                <div class="list-group mt-3">
                                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1"><b><i class="fas fa-star-half-alt" aria-hidden="true"></i> {{ $item->group->program->name_program() }}</b></h6>
                                    </div>
                                    <small class="mb-1">Horario : <b>{{ $item->group->schedule->name  }}</b></small></br>
                                    <small>Docente Encargado : <b>{{ $item->group->user->names() }}</b> </small></br>
                                    <span class="badge badge-sm bg-informative mt-2">{{ count($item->group->students) }} Estudiantes Matriculados</span>
                                    </a>
                                </div>
                
                                @endforeach
                
                                @if ($y == 0)
                                    <div class="list-group mt-3">
                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start ">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1"><b>El estudiante NO está matriculado en ningún programa.</b></h6>
                                            </div>
                                            <small class="mb-1">(No tiene asignado ningun programa tecnico)</small>
                                        </a>
                                </div>
                                @endif
                            </div>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
   
        </div>

       

       


    </div>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Deseas eliminar a este estudiante del curso?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="GET" action="{{ route('users.delete',$user->id) }}">
                @csrf
                <div class="modal-body">
                    <p>Cuando eliminas al estudiante, eliminas todas las notas asignadas en los modulos de este programa.</p>
                    <h6>Cedula : <span id="CedulaModal">{{ $user->nit }}</span></h6>
                    <h6>Nombre : <span id="NombreModal">{{  $user->firstname  }} {{ $user->lastname }}</span> </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Si, Eliminar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    

    <script>
         $(".sidenav").remove();
        let input = false;
        $("input").keyup((event)=>{
            input = true;
            $(".btnDelete1").attr('disabled', false);
        });
    </script>

@endsection
