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
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">Nombre</label>
                                <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   value="{{  old('firstname')  }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">Apellido</label>
                                <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{  old('lastname')  }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">Cedula</label>
                                <input type="number" name="nit" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{  old('nit')  }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="exampleInputEmail1">Correo Electronico</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{  old('email')  }}">
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Contraseña</label>
                          <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{  old('password')  }}" >
                        </div>

                        <input type="hidden" name="page" value="{{ $before }}">

                        <div class="form-inline">
                            <small>Elije los <b>Roles</b></small>
                            <div class="row">
                                <div class="col-auto mb-3 form-check ml-4">
                                    <input                    
                                    type="checkbox" name="estudiante" value="estudiante" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Estudiante</label>
                                </div>
                                <div class="col-auto mb-3 form-check">
                                    <input
                                    type="checkbox" name="profesor" value="profesor" class="form-check-input" id="exampleCheck2">
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


 

  


@endsection
