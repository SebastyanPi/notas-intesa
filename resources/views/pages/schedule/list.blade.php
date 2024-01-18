@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Horarios'])



    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            Horarios
                        </h5>
                        <small>En esta Sección puedes agregar los horarios que son ofertados los programas en la institución.</small>
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
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group">
                                @foreach ($schedules as $schedule)
                                    <li class="list-group-item  justify-content-between align-items-center">
                                        
                                        <form class="row " method="POST" action={{ route('schedule.update', $schedule->id) }}>
                                            @csrf
                                            <div class="col-md-8">
                                              <label for="inputPassword2" class="visually-hidden"></label>
                                              <input type="text" name="name" class="form-control" id="inputPassword2"  value="{{ $schedule->name }}">
                                            </div>
                                            <div class="col-md-4">
                                              <button type="submit" class="btn-n btn-n-primary mb-3"><i class="fas fa-save"></i></button>
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


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Crear Horario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action={{ route('schedule.store') }}>
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
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
