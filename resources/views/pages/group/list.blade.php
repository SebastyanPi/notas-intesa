@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Grupos'])



    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            Grupos
                        </h5>
                        <small>En esta Sección puedes crear los grupos de tecnicos que son ofertados en la institución.</small>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">

                            <li class="nav-item " data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "
                                    data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                    <i class="ni ni-tag"></i>
                                    <span class="ms-2">Crear</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-4">

                    <table class="table table-striped align-items-center mb-0" style="overflow:scroll;max-height:400px !important;">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Codigo de Grupo</th>
                                <th>Docente Encargado</th>
                                <th>Programa</th>
                                <th>Horario</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $k = 0;
                            @endphp
                            @foreach ($groups as $group)
                            @php
                                $k++;
                            @endphp
                                <tr class="text-center">
                                    <td>{{ $k }}</td>
                                    <td><span class="badge badge-sm bg-primary">{{ $group->code }}</span></td>
                                    <td>{{ $group->user->username }}</td>
                                    <td>{{ $group->program->name }}</td>
                                    <td>{{ $group->schedule->name }}</td>
                                    <td><a class="modalGroupDelete pointer"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $user->id  }}"  ><i class="fas fa-trash"></i></a></td>
                                </tr>
                                @livewire('form-student-group-delete', ['group_id' => $id_group,'student_id' => $user->id, "nit" => $user->nit,"nombre" => $user->firstname." ".$user->lastname ], key($user->id))
        
                            @endforeach                             
                        </tbody>
                
                        <tfoot>
                                                   
                        </tfoot>
                    </table> 


                 
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Grupo</h5>
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

                <div class="form-group">
                    <label for="exampleFormControlInput1">Tecnico Laboral</label>
                    <select class="form-control" name="program_id" id="">
                        @foreach ($programs as $programa)
                            <option value="{{ $programa->id }}">{{ $programa->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Horario</label>
                    <select class="form-control" name="schedule_id" id="">
                        @foreach ($schedules as $schedule)
                            <option value="{{ $schedule->id }}">{{ $schedule->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Docentes</label>
                    <select class="form-control" name="user_id" id="">
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
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn bg-gradient-primary">Guardar</button>
        </div>
            </form>
      </div>
    </div>
  </div>

  


@endsection
