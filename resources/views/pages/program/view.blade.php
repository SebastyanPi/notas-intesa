@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Programas Tecnicos Laborales'])

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            <a class="text-primary" href="{{ route('program.index') }}"><i class="ni ni-bold-left"></i><i class="ni ni-bold-left"></i></a>
                            {{ $program->name_program() }}
                        </h5>
                        <small>En esta sección se gestiona los modulos del programa seleccionado.</small>
                        <div class="line-info mt-3">
                          <span class=""><i class="fas fa-layer-group"></i>Numero de Modulos : <b class="">{{ count($program->modules) }}</b></span>
                          <span class=""><i class="fas fa-layer-group"></i>Numero de Grupos :  <b class="">{{ count($program->groups) }} </b></span>
                      </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">                        
                        <div id="alert">
                            @include('components.alert')
                        </div> 

                    </div>
                </div>

                <div class="mt-4">
                    <div class="row">
                      
                        <div class="col-md-12">
                          <div class="d-flex justify-content-end">
                            <span data-bs-toggle="modal" data-bs-target="#exampleModal"  class="btn-n-small btn-n-primary" style="font-size: 15px"><i class="fas fa-plus"></i> Modulo</span>
                            <button data-bs-toggle="modal" data-bs-target="#EditarPrograma" class="btn-n btn-n-informative mx-1"><i class="fas fa-edit"></i> Programa </button>
                            <a href="{{ route('program.groups',$program->id) }}" class="btn-n  btn-n-primary "><i class="fas fa-share"></i> Grupos</a>
                            <a target="__blank" href="{{ route('program.modules.pdf', ['id' => $program->id]) }}" class="btn-n-small btn-n-danger-outline"  style="font-size: 15px"><i class="fas fa-download"></i><b>PDF</b></a>
                          </div>
                            <ul class="list-group mt-2">
                              @php
                                  $y = 0;
                              @endphp
                                @foreach ($program->modules as $modulo)
                                @php
                                    $y++;
                                @endphp
                                    <li class="list-group-item  justify-content-between align-items-center">
                                        
                                        <form class="row g-3" method="POST" action={{ route('module.update', $modulo->id) }}>
                                            @csrf

                                          <div class="col-md-6">
                                            <div class="input-group mb-3">
                                              <span class="input-group-text" id="basic-addon1">Modulo #{{ $y }} </span>
                                              <input class="form-control text-center" name="name" type="text" value="{{ $modulo->name }}" >
                                            </div>
                                          </div>
                                            <div class="col-md-4">
                                              <button type="submit" class="btn-n btn-n-primary-outline mb-3"><i class="fas fa-save"></i></button>
                                              @if (count($modulo->qualifications) == 0)
                                              <button data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $modulo->id  }}" type="button" class="btn-n btn-n-danger-outline mb-3"><i class="fas fa-trash"></i></button>
                                              
                                              @endif
                                              
                                            </div>
                                        </form>
                                    
                                    </li>

                                   
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @foreach ($program->modules as $modulo)
      @if (count($modulo->qualifications) == 0)
        <div class="modal fade" id="staticBackdrop{{ $modulo->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Deseas eliminar este modulo?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <h6>Modulo : <span>{{ $modulo->name }}</span></h6>
              </div>
              <form method="POST" action="{{ route('module.destroy', $modulo->id) }}">
                  @csrf
                  <input type="hidden" name="module_id" value="{{  $modulo->id }}">
                  <input type="hidden" name="program_id" value="{{ $program->id }}">
                  <div class="modal-footer">
                      <button type="button" class="btn-n btn-n-informative close" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn-n btn-n-danger ">Si, Eliminar</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>                                                                        
      @endif
    @endforeach
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Modulo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action={{ route('module.store') }}>
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
                  </div>
                <div class="form-group d-none">
                    <label for="exampleFormControlInput1">Codigo programa</label>
                    <input type="text" name="program_id" value="{{ $program->id }}" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-n btn-n-informative" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn-n btn-n-primary">Guardar</button>
          
        </div>
            </form>
      </div>
    </div>
  </div>

  
  <div class="modal fade" id="deleteProgram" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Deseas eliminar la nota de este estudiante del curso?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <form method="POST" action="{{ route('program.destroy',$program->id) }}">
            @csrf
            <input type="hidden" name="program_id" value="{{ $program->id }}">
            <button type="button" class="btn-n btn-n-informative close" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn-n btn-n-danger EliminarItem">Si, Eliminar</button>
          </form> 
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditarPrograma" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar Programa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <form class="row rounded pt-2" method="POST" action={{ route('program.update', $program->id) }}>
          @csrf
          <div class="col-md-12">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><b>Programa</b></span>
              <input type="text" name="name" class="form-control text-center" aria-describedby="basic-addon1" value="{{ $program->name }}">
            </div>

          </div>

          <div class="col-md-12">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1"><b>Tipo</b></span>
              <input type="text" disabled="" class="form-control text-center" aria-describedby="basic-addon1" value="{{ $program->type }}">
            </div>
          </div>

          <div class="col-md-12">
            <button type="submit" class="btn-n btn-n-informative mb-3">Guardar</button>
            @if (count($program->modules) == 0 && count($program->groups) == 0)
              <button data-bs-toggle="modal" data-bs-target="#deleteProgram" type="button" class="btn-n btn-n-danger">Elminar</button>
            @endif
            
          </div>

          
        </form>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
