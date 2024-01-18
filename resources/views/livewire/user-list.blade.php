<div>
    <div class="container-fluid my-3">
        <form class="row g-3 mb-4">
            @csrf
            <div class="col-md-6">
            <label for="inputPassword2" class="visually-hidden"></label>
            <input type="text" wire:model="search" name="buscador" class="form-control" placeholder="Busca a un usuarios por nombre o correo.">
            </div>
            <div class="col-auto d-none">
            <button type="submit" class="btn btn-primary mb-3">Buscar</button>
            </div>
        </form>
   </div>

    <div class="table-responsive p-0">
        <table class="table align-items-center mb-0" style="overflow:scroll;max-height:400px;">
            <thead>
                <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                        Cedula</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                        Nombre de Usuario</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                        Nombre</th>
                    <th
                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                        Apellido</th>
                    <th
                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                        Email</th>
                    <th
                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                        Rol</th>
                    <th
                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                        </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $item)

                @php 
                    $collection = $item->getRoleNames();
                @endphp

                <tr>
                    <td class="text-center">
                        <b>
                            <small>{{ $item->nit }}</small>
                        </b>
                    </td>
                    <td class="text-center">
                        <b>
                            <small>@ {{ $item->username }}</small>
                        </b>
                    </td>
                    <td class="text-center">
                        <small>{{ $item->firstname }}</small>
                    </td>
       
                    <td class="text-center">
                        <small>{{ $item->lastname }}</small>
                    </td>
                    <td class="text-center">
                        <small>{{ $item->email  }}</small>
                    </td>
                    <td class="text-center">
                        @if ($collection[0] == "Administrador")
                        <span class="badge badge-sm bg-secondary">{{ $collection[0] }}</span>
                        @elseif ($collection[0] == "Estudiante")
                            <span class="badge badge-sm bg-primary">{{ $collection[0] }}</span>
                        @else
                            <span class="badge badge-sm bg-danger">{{ $collection[0] }}</span>
                        @endif
                    </td>

                    <td class="text-center">
                        <a href="{{ route('users.edit', $item->id) }}"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach


            </tbody>

            <tfoot>
               
            </tfoot>
        </table>
    </div>
</div>
