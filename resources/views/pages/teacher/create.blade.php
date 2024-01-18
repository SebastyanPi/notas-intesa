@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Formulario de Estudiante'])
    <div class="container">
        <div class="card mb-4">
            <div class="card-header pb-0">
    
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            Formulario de Estudiante
                        </h5>
                    </div>
                </div>            
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                
            </div>
        </div>
    </div>
@endsection