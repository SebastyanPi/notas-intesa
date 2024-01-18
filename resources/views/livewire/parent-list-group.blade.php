<div class="mt-2">
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="w-100">
                    <input type="text" wire:model="search" class="form-control" id="exampleFormControlInput1" placeholder="Filtrar por cedula, nombre, apellido" >
                  </div>   
            </div>
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
                            <div class="form-check text-center">
                                <input class="form-check-input" wire:click="$emitTo('show-list-group', 'render')" wire:model="seleccionado" type="radio" id="exampleRadios{{ $user->id }}" value="{{ $user->id  }}">
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>



</div>
