<div>
    
    <div class="card">
        <div class="card-header">
            <div class="">
                <input type="text" wire:model="search" class="form-control" id="exampleFormControlInput1" placeholder="Filtrar por cedula, nombre, apellido" >
              </div>              
        </div>
        <div class="card-body">
            <table class="table table-striped table-responsive" style="overflow:scroll;max-height:400px;">
                <thead>
                    <tr class="text-center">
                        <th>Cedula</th>
                        <th>Estudiante</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($json as $user)
                    <tr>
                        <td><span class="badge badge-sm bg-primary">{{ $user->nit }}</span></td>
                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                        <td class="text-center">
                            <div class="form-check">
                                <input class="form-check-input" wire:model="seleccionado" type="radio" id="exampleRadios{{ $user->id }}" value="{{ $user->id  }}">
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
