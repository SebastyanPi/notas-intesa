@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Grupos por Programas'])

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            <a class="text-primary" href="{{ route('program.index') }}"><i class="ni ni-bold-left"></i><i class="ni ni-bold-left"></i></a>
                            @switch($program->type)
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
                            
                             {{ $program->name }}
                        </h5>
                        <small>En esta Sección puedes añadir grupos al programa seleccionado.</small>
                    </div>
                </div>


                <div class="mt-4">
                    <div class="mb-3 d-flex justify-content-end">
                        <div>
                            <span data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn-n-small btn-n-primary"  style="font-size: 15px"><i class="fas fa-plus"></i> Añadir Grupo</span>
                            <a href="{{ route('program.show',$program->id) }}" class="btn-n-small btn-n-informative"  style="font-size: 15px"><i class="fas fa-share"></i> Ver Modulos</a>
                            <a target="__blank" href="{{ route('program.pdf', ['id' => $program->id]) }}" class="btn-n-small btn-n-danger-outline"  style="font-size: 15px"><i class="fas fa-download"></i><b>PDF</b></a>
                        </div>
                    </div>

                    <table class="table table-striped align-items-center mb-0" style="overflow:scroll;max-height:400px !important;">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Codigo de Grupo</th>
                                <th>Horario</th>
    
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $k = 0;
                            @endphp
                            @foreach ($program->groups as $group)
                            @php
                                $k++;
                            @endphp
                                <tr class="text-center">
                                    <td>{{ $k }}</td>
                                    <td><span class="badge badge-sm bg-primary">{{ $group->code }}</span></td>
                                    <td>{{ $group->schedule->name }}</td>
                               
                                    <td>
                                        <a class="pl-2" href="{{ route('group.edit',$group->id ) }}"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('group.add',$group->id ) }}"><i class="fas fa-share"></i></a>
                                        </td>
                                </tr>
        
                            @endforeach
                            
                            @if ($k==0)
                                <tr>
                                    <td colspan="5">No existen grupos para este programa.</td>
                                </tr>
                            @endif
                        </tbody>
                
                        <tfoot>
                                                   
                        </tfoot>
                    </table> 


             

                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <div>   
                <h5 class="modal-title" id="exampleModalLabel">Crear Grupo</h5>
                <span class="badge badge-lg bg-primary">Tecnico Laboral en {{ $program->name }}</span>
            </div>

          
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('group.store') }}" >
                @csrf

                <div class="form-group">
                    <label for="exampleFormControlInput1">Codigo de Grupo</label>
                    <input type="text" name="code" class="form-control" id="exampleFormControlInput1" placeholder="">
                  </div>

                <div class="form-group d-none">
                    <input type="hidden" name="program_id" value="{{ $program->id }}">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Horario</label>
                    <select class="form-control" name="schedule_id" id="">
                        @foreach ($schedules as $schedule)
                            <option value="{{ $schedule->id }}">{{ $schedule->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group d-none">
                    <label for="exampleFormControlInput1">Docente</label>
                    
                    <select class="form-control" name="user_id" id="">
                        <option value="1">Administrativo Intesa</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }}</option>
                        @endforeach
                    </select>
                </div>

                  <div id="alert">
                    @include('components.alert')
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

  


@endsection
