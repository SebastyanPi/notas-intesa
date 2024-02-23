@extends('role_teacher.layout.app')

@section('content')

   <div class="container-fluid mt-4">
    <div class="card btn-n-orange mt-3 text-white">
      <div class="card-body">
        Bienvenido al Campus Virtual- INTESA. <br />

        <i class="fas fa-hand-sparkles"></i> Hola <b> {{ auth()->user()->names() }}.</b>
      </div>
    </div>
    <div class="d-flex justify-content-center mt-3">
      <div class="row">
        <div class="col-md-3">
            <div class="card">
              <div class="card-header text-center">
                <b> Campus Institucional </b>  
              </div>
              <hr>
              <div class="card-body text-center">
                <div class="d-flex justify-content-center">
                  <img src="{{ env('APP_URL') }}img/institucional.png" class="w-50" alt="">
                </div>
                <small class="text-justify">En esta sección puedes ver el registro de tu matricula, tus notas...</small>
              </div>
              <hr>
              <div class="card-footer">
                <div class="d-grid gap-2">
                  @php
                      $y = 0;
                  @endphp
                  @if ($y > 0)
                    <a href="{{ route('page_student02.index') }}" class="btn btn-primary btn-block">Ingresar  <i class="fas fa-angle-double-right"></i></a>
                  @else
                    <button class="btn btn-primary btn-block" disabled >No Disponible  <i class="fas fa-angle-double-right"></i></button>
                  @endif


                  
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3">
          <div class="card" >
            <div class="card-header text-center">
              <b>Campus de Formación</b>
            </div>
            <hr>
            <div class="card-body">
              <div class="d-flex justify-content-center">
                <img src="{{ env('APP_URL') }}img/formacion.png" class="w-50" alt="">
              </div>
              <small class="text-justify">En esta sección puedes crear tus clases, examenes ..etc</small>
            </div>
            <hr>
            <div class="card-footer">
              <div class="d-grid gap-2">
                @if (count(auth()->user()->token) > 0)
                  <a href="{{ route('campus.formacion', auth()->user()->nit) }}" class="btn btn-primary btn-block">Ingresar  <i class="fas fa-angle-double-right"></i></a>
                @else
                  <button class="btn btn-primary btn-block" disabled >No Disponible  <i class="fas fa-angle-double-right"></i></button>
                @endif
               
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card" >
            <div class="card-header text-center">
              <b>Campus Financiero</b>
              
            </div>
            <hr>
            <div class="card-body text-center">
              <div class="d-flex justify-content-center">
                <img src="{{ env('APP_URL') }}img/financiero.png" class="w-50" alt="">
              </div>
        
              <small class="text-justify">En esta sección puedes ver tu estado financiero, como cuotas, plan de pago...</small>
            </div>
            <hr>
            <div class="card-footer">
              <div class="d-grid gap-2">
                <button class="btn btn-primary btn-block" disabled >No Disponible  <i class="fas fa-angle-double-right"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>
@endsection