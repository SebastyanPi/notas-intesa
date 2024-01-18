@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Programas'])



    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            Intesa - Notas
                        </h5>
                        <small>Institución para el Trabajo y Desarrollo Humano.</small>
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
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <b><i class="fas fa-star-half-alt"></i> Tecnicos Laborales</b>
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="list-group">
                        
                                    @foreach ($programas as $programa)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <p> <i class="fas fa-minus"></i> <b> Tecnico Laboral</b> {{ $programa->name }}</p>
                                            <div>
                                                <a href="{{ route('program.show',$programa->id) }}" class="btn-n  btn-n-primary">Modulos <i class="ni ni-bold-down"></i></a>
                                                <a href="{{ route('program.groups',$programa->id) }}" class="btn-n  btn-n-informative">Grupos <i class="ni ni-bold-down"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
            
                                </ul>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <b><i class="fas fa-star-half-alt"></i> Diplomados </b>
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="list-group">
                        
                                    @foreach ($diplomados as $diplomado)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <p><i class="fas fa-minus"></i> <b>Diplomado</b> {{ $diplomado->name }}</p>
                                            <div>
                                                <a href="{{ route('program.show',$diplomado->id) }}" class="btn-n  btn-n-primary">Modulos <i class="ni ni-bold-down"></i></a>
                                                <a href="{{ route('program.groups',$diplomado->id) }}" class="btn-n  btn-n-informative">Grupos <i class="ni ni-bold-down"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
            
                                </ul>
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <b><i class="fas fa-star-half-alt"></i> Cursos </b>
                            </button>
                          </h2>
                          <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="list-group">
                        
                                    @foreach ($cursos as $curso)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <p><i class="fas fa-minus"></i> <b>Curso</b> {{ $curso->name }}</p>
                                            <div>
                                                <a href="{{ route('program.show',$curso->id) }}" class="btn-n  btn-n-primary">Modulos <i class="ni ni-bold-down"></i></a>
                                                <a href="{{ route('program.groups',$curso->id) }}" class="btn-n  btn-n-informative">Grupos <i class="ni ni-bold-down"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
            
                                </ul>
                            </div>
                          </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCuatro" aria-expanded="false" aria-controls="collapseThree">
                                <b><i class="fas fa-star-half-alt"></i> Seminario </b>
                              </button>
                            </h2>
                            <div id="collapseCuatro" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                <ul class="list-group">
                        
                                    @foreach ($seminarios as $seminario)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <p><i class="fas fa-minus"></i> <b>Seminario</b> {{ $seminario->name }}</p>
                                            <div>
                                                <a href="{{ route('program.show',$seminario->id) }}" class="btn-n  btn-n-primary">Modulos <i class="ni ni-bold-down"></i></a>
                                                <a href="{{ route('program.groups',$seminario->id) }}" class="btn-n  btn-n-informative">Grupos <i class="ni ni-bold-down"></i></a>
                                            </div>
                                        </li>
                                    @endforeach
            
                                </ul>

                              </div>
                            </div>
                          </div>
                      </div>

                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCinco" aria-expanded="false" aria-controls="collapseCinco">
                            <b><i class="fas fa-star-half-alt"></i> Otros </b>
                          </button>
                        </h2>
                        <div id="collapseCinco" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                           
                            <ul class="list-group">
                        
                                @foreach ($otros as $otro)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <p><i class="fas fa-minus"></i> {{ $otro->name }}</p>
                                        <div>
                                            <a href="{{ route('program.show',$otro->id) }}" class="btn-n  btn-n-primary">Modulos <i class="ni ni-bold-down"></i></a>
                                            <a href="{{ route('program.groups',$otro->id) }}" class="btn-n  btn-n-informative">Grupos <i class="ni ni-bold-down"></i></a>
                                        </div>
                                    </li>
                                @endforeach
        
                            </ul>

                          </div>
                        </div>
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
          <h5 class="modal-title" id="exampleModalLabel">Crear Programa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action={{ route('program.store') }}>
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlInput1">Tipo</label>
                    <select class="form-control" name="type" id="">
                        <option value="Tecnico">Tecnico</option>
                        <option value="Diplomado">Diplomado</option>
                        <option value="Curso">Curso</option>
                        <option value="Seminario">Seminario</option>
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
