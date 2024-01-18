@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@php
    //dd($modules)
    //echo $module->programs;
    /*foreach ($module->programs as $programa) {
        echo $programa->name;
    }*/

    /*foreach ($modules as $modulo) {
        foreach ($modulo->programs as $programa) {
            echo $programa->name;
        }
    }*/

    /*foreach ($module as $key) {
        echo $key->programs;
    }*/
@endphp


@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Modulos'])
    <div class="shadow-lg mx-4 card-profile-bottom">
        <div class="row">
            <div class="col-8">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h5>Modulos </h5>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center justify-content-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nombre</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($modules as $modulo)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="d-none">
                                                        <img src="/img/small-logos/logo-spotify.svg"
                                                            class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                                                    </div>
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $modulo->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-bold mb-0">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">
                                                        <i class="ni ni-settings-gear-65 text-dark opacity-10"></i>
                                                    </button>
                                                </p>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <form role="form" method="POST" action={{ route('module.store') }}>
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Nombre</label>
                              <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3 d-none">
                              <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                              <input type="text" name="description" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-secondary btn-sm">Guardar</button>
                          </form>
                          <div>
                            <div id="alert">
                                @include('components.alert')
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection
