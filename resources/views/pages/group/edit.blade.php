@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Editar Grupo'])

    <div class="container-fluid py-4">

        <div class="card">
            <div class="card-header">
                <h5 class="mb-1">
                    Grupo
                </h5>
                <div class="line-info mt-2">
                    <span class=""><i class="fas fa-layer-group"></i>Nombre : <b class="">{{ $group->code }}</b></span>
                    <span class=""><i class="fas fa-layer-group"></i>Programa : <b class="">{{ $group->program->name_program() }}</b></span>
                    <span class=""><i class="fas fa-layer-group"></i>Horario : <b class="">{{ $group->schedule->name }}</b></span>
                </div>
                <div class="line-info mt-3">
                    <span class=""><i class="fas fa-layer-group"></i>Docente : <b class="">{{ $group->user->names() }}</b></span>
                    <span class=""><i class="fas fa-layer-group"></i>Matriculados en el Grupo : <b class="">{{ count($group->students) }}</b></span>
                </div>
            </div>
            <hr>
            <div class="card-body" >
                <form method="POST" action="{{ route('group.update',$group->id) }}">
                <div class="row">
                    <div class="col-md-10">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="hidden" name="program_id" value="{{ $group->program->id }}">
                                        <span class="input-group-text" id="basic-addon1">Codigo</span>
                                        <input name="code" type="text" class="form-control text-center" aria-describedby="basic-addon1" value="{{ $group->code }}">
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Programa</span>
                                        <input type="text" disabled class="form-control text-center" aria-describedby="basic-addon1" value="{{ $group->program->name_program() }}">
                                      </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Horario</span>
                                        <select name="schedule_id" class="form-control text-center">
                                            @foreach ($schedules as $item)
                                                <option @if ($item->id == $group->schedule->id)
                                                    selected
                                                @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach                                         
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-6 d-none">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Docente</span>
                                        <select name="user_id" class="form-control text-center">
                                            <option  @if ($group->user->id == 1)
                                                selected class="text-danger"
                                                @endif value="1">Administrativo Intesa</option>
                                           
                                            @foreach ($users as $user)
                                                <option @if ($user->id == $group->user->id)
                                                    selected class="text-danger"
                                                @endif value="{{ $user->id }}">{{ $user->names() }}</option>
                                            @endforeach                                         
                                        </select>
                                      </div>
                                </div>
                            </div>

                            <div class="row">   
                                <div class="col-md-12">
                                    <textarea name="description" class="form-control" name="" id="" cols="30" rows="3" placeholder="Escribe aqui una descripción de Grupo.">{{ $group->description }}</textarea>
                                </div>
                            </div>

                            <div class="mt-2">
                                <a href="{{ route('program.groups', $group->program->id) }}" class="btn-n btn-n-primary" ><i class="fas fa-arrow-left"></i></a>
                                <button type="submit" disabled class="btn-n btn-n-primary btnDelete1"> <i class="fas fa-save"></i> Guardar</button>
                                @if (count($group->students) == 0 && count($group->qualifications) == 0)
                                    <button type="button"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn-n btn-n-primary"> <i class="fas fa-trash-alt"></i> Eliminar</button>
                                @endif
                                <a href="{{ route('group.add',$group->id ) }}" class="btn-n btn-n-aquarela" ><i class="fas fa-share"></i> Ver Grupo</a>
                            </div>
                 
                    </div>
                    <div class="col-md-2">
                        <b><i class="fas fa-exclamation-triangle"></i> IMPORTANTE</b>
                      <small class="text-justify">
                        Recuerda que todo los cambios que hagas en el grupo tiene repercursion con los estudiantes asignados.
                      </small>
                      
                    </div>
                </div>

            </form>

       

            </div>
        </div>
    </div>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Deseas eliminar este Grupo?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('group.destroy',['id' => $group->id,'program_id' => $group->program->id]) }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $group->id }}">
                    <input type="hidden" name="program_id" value="{{ $group->program->id }}">
                    <h6>Grupo : <span> {{ $group->code }}</span></h6>
                    <h6>Programa : <span>{{ $group->program->name_program() }}</span></h6>
                    <h6>Horario : <span>{{ $group->schedule->name }}</span></h6>
                    <h6>Docente : <span>{{ $group->user->names() }}</span></h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-n btn-n-informative close" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn-n btn-n-danger">Si, Eliminar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    

    <script>
        let input = false;
        $("input").keyup((event)=>{
            input = true;
            $(".btnDelete1").attr('disabled', false);
        });

        $("select").change((event)=>{
            input = true;
            $(".btnDelete1").attr('disabled', false);
        });
        $("textarea").keyup((event)=>{
            input = true;
            $(".btnDelete1").attr('disabled', false);
        });
    </script>

@endsection
