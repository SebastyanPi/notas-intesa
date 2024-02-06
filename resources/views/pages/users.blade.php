@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Usuarios'])

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            <a class="text-primary" href="
                            @if ($before == "student")
                                {{ route('student.index') }}
                            @else
                                {{ route('teacher.index') }}
                            @endif
                            "><i class="ni ni-bold-left"></i><i class="ni ni-bold-left"></i></a>  Registro de Usuarios
                        </h5>
                        <small>En esta Sección puedes crear usuarios segun los roles que son ofertados en la institución.</small>
                    </div>
                </div>

                    @if ($errors->any())
                        

                    <div class="alert alert-danger" id="listErrors" style="color:#fff;font-size: 12px" >
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                        <script>
                            setTimeout(() => {
                                document.getElementById('listErrors').remove();
                            }, 2000);
                        </script>
                    @endif


                <div class="mt-4">
                    <form method="POST" action="{{ route('users.new') }}">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Nombres</span>
                                    <input type="text" name="firstname"  class="form-control text-center" aria-describedby="basic-addon1" value="{{ old('firstname') }}">
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Apellidos</span>
                                    <input type="text" name="lastname"  class="form-control text-center" aria-describedby="basic-addon1" value="{{ old('lastname') }}">
                                  </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Cedula</span>
                                    <input type="number" name="nit"  class="form-control text-center" aria-describedby="basic-addon1" value="{{ old('nit') }}">
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Correo</span>
                                    <input type="email" name="email"  class="form-control text-center" aria-describedby="basic-addon1" value="{{ old('email') }}">
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Contraseña</span>
                                    <input type="password" name="password" id="password" class="form-control text-center" aria-describedby="basic-addon1" value="{{ old('password') }}">
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="n-tooltip"><b><small>Ver contraseña</small></b>
                                    <span class="n-tooltiptext" id="verpassword"></span>
                                  </div>
                            </div>
                        </div>

                        <input type="hidden" name="page" value="{{ $before }}">

                        <div class="form-inline">
                            <small class="d-none">Elije los <b>Roles</b></small>
                            <div class="row">
                                <div class="col-auto mb-3 form-check ml-4">
                                    <input                    
                                    type="radio" @if ($before == "student")
                                        checked
                                    @endif name="role" value="estudiante" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Estudiante</label>
                                </div>
                                <div class="col-auto mb-3 form-check">
                                    <input @if ($before == "teacher")
                                    checked
                                @endif
                                    type="radio" name="role" value="profesor" class="form-check-input" id="exampleCheck2">
                                    <label class="form-check-label" for="exampleCheck2">Profesor</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn-n btn-n-primary">Guardar</button>
                      </form>
                </div>

            </div>
        </div>
    </div>


    <script>
 
        $( "#password" ).on( "keyup", function() {
            $("#verpassword").text($(this).val());
        });

    </script>

 

  


@endsection
