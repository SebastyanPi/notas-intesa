@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Matriculados por Grupos'])

    <div class="container-fluid">
        
        <div class="card ">
            <div class="card-body">
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <div class="mb-3">
                            <h5 class="mb-1">
                                <a class="text-primary" href="{{ route('program.groups', $group->program_id) }}"><i class="ni ni-bold-left"></i><i class="ni ni-bold-left"></i></a> 
                                @switch($group->program->type)
                                    @case('Tecnico')
                                        Tecnico Laboral
                                        @break
                                    @case('Diplomado')
                                        Diplomado
                                        @break
                                    @case('Curso')
                                        Curso
                                        @break
                                    @case('Seminario')
                                        Seminario
                                        @break
                                    @default 
                                @endswitch
                                
                                
                                {{ $group->program->name }} <span class="badge badge-sm badge-n-primary"><i class="fas fa-clock"></i>  {{  $group->schedule->name }}</span> 
                            </h5>
                            <small class="">En esta Sección puedes gestionar los programas tecnicos.</small>
                        </div>

                        <div class="line-info">
                            <span class=""><i class="fas fa-layer-group"></i>Grupo : <b class="">{{ $group->code }}</b></span>
                            <span class="d-none"><i class="fas fa-user-graduate"></i>Numero de Matriculados :  <b class="">{{ count($group->students) }} </b></span>
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
            </div>
        </div>

        @livewire('show-list-group', ["id_group" => $group->id, "group" => $group])
 
    </div>


    <div class="modal fade" id="exampleModalFullscreen2" tabindex="-1" aria-labelledby="exampleModalFullscreen2Label" aria-modal="true" role="dialog" >
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-4" id="exampleModalFullscreen2Label"><i class="fas fa-users"></i> Asignar Docente</h1>
            <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close" style="color: #000;">
              <span style="font-size:30px !important;" aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="" >
              <div class="modal-body">
                  <div class="my-2">
                      <p>Nombre del Programa : <b>Tecnico Laboral {{ $group->program->name }} </b></p> 
                      <div class="line-info mt-2">
                      
                          <span class=""><i class="fas fa-clock"></i>  {{  $group->schedule->name }}</span> 
                          <span class="" ><i class="fas fa-stream"></i> Grupo: {{ $group->code }}</span>
                      </div>
                  </div>
                  
                  @livewire('assign-module', ["id_group" => $group->id, "group" => $group, "id_program" => $group->program_id])
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn-n btn-n-informative" data-bs-dismiss="modal">Cerrar</button>
                </div>
          </form>
        </div>
      </div>
    </div>


  <div class="modal fade" id="exampleModalFullscreen" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel" aria-modal="true" role="dialog" >
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-4" id="exampleModalFullscreenLabel"><i class="fas fa-users"></i> Matricular Estudiantes</h1>
          <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close" style="color: #000;">
            <span style="font-size:30px !important;" aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="" >
            <div class="modal-body">
                <div class="my-2">
                    <p>Nombre del Programa : <b>Tecnico Laboral {{ $group->program->name }} </b></p> 
                    <div class="line-info mt-2">
                    
                        <span class=""><i class="fas fa-clock"></i>  {{  $group->schedule->name }}</span> 
                        <span class="" ><i class="fas fa-stream"></i> Grupo: {{ $group->code }}</span>
                    </div>
                </div>
                
                @csrf
                
                @livewire('parent-list-group',["id_group" => $group->id, "group" => $group])
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-n btn-n-informative" data-bs-dismiss="modal">Cerrar</button>
              </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="exampleModalFullscreen1" tabindex="-1" aria-labelledby="exampleModalFullscreenLabel1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-4" id="exampleModalFullscreenLabel1"><i class="fas fa-users"></i> Cargar Notas</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: #000;">
            <span style="font-size:30px !important;" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="my-3">
                <b>Tecnico Laboral {{ $group->program->name }} </b>
                <div class="line-info mt-2">
                    <span class=""><i class="fas fa-clock"></i>  {{  $group->schedule->name }}</span> 
                    <span class="" ><i class="fas fa-stream"></i> Grupo: {{ $group->code }}</span>
                </div>
            </div>

            <table class="table table-striped border ">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th class="text-center" scope="col">Modulo</th>
                    <th class="text-center" scope="col">Docente</th>
                    <th class="text-center" scope="col">Click</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $k = 0;
                    @endphp
                  @foreach ($group->program->modules as $module)
                  @php
                      $k++;
                  @endphp
                      <tr>
                        <td class="text-center">{{  $k }}</td>
                        <td class="text-center">{{ $module->name }}</td>
                        <td class="text-center">{{ $module->user->names() }}</td>
                        <td class="text-center"> <a href="{{ route('group.qualification', ['id'=> $group->id, 'module_id' => $module->id]) }}" class="btn-n btn-n-primary"><i class="fas fa-upload"></i>  </a></td>
                      </tr>
                  @endforeach

                </tbody>
              </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn-n btn-n-informative" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(".sidenav").remove();
    $(".modalGroupDelete").click((event)=>{
        element = event.target;
        let id = element.getAttribute( "id" );
        $("#CedulaModal").text(element.getAttribute( "cedula" ));
        $("#NombreModal").text(element.getAttribute( "nombre" ));
        $("#idModal").val(id);
    
    });

    $(".EliminarItem").click(() => {
        $(".btn-n-informative").click();
    });

    $(".close").click(function(){
        $("#modalnotas").removeClass('show');
    }); 


  </script>

  @endsection

