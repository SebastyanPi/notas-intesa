<div class=""> 
    <div class="card">
        <div class="card-header">
            <div class="d-flex">
                <div class="w-80">
                    <input type="text" wire:model="search" class="form-control" id="exampleFormControlInput1" placeholder="Filtrar por cedula, nombre, apellido" >
                  </div>   
                <div class="w-20">
                    <button type="button" class="badge-n-primary" data-bs-dismiss="modal">X</button>
                </div>
            </div>
                   
        </div>
        <div class="card-body">
            <table class="table table-striped table-responsive" style="overflow:scroll;max-height:400px;">
                <thead>
                    <tr class="text-center">
                        <th></th>
                        <th>Cedula</th>
                        <th>Estudiante</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($json as $user)
                    <tr>
                        <td><img src="https://ui-avatars.com/api/?name={{$user->username}}&&background=47E1EA" class="avatar avatar-sm me-3" style="border-radius: 50%" alt="user1"></td>
                        <td>{{ $user->nit }}</td>
                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                        <td class="text-center">
                            <div class="form-check text-center">
                                <input class="form-check-input" wire:change="seleccionado" type="radio" id="exampleRadios{{ $user->id }}" value="{{ $user->id  }}">
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
