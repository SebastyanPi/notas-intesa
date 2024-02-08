<div class="card mt-3">

    <div class="card-body">
        <div class="mb-3">
            <div class="mb-3 d-flex justify-content-end">
                <div>
                    <span data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen" class="btn-n-small btn-n-primary" id="notas" style="font-size: 15px"><i class="fas fa-upload"></i> Cargar Notas</span>
                    <span data-bs-toggle="modal" data-bs-target="#exampleModalFullscreen1" class="btn-n-small btn-n-primary" style="font-size: 15px"><i class="fas fa-upload"></i> Agregar Estudiante</span>
                    <a target="__blank" href="{{ route('group.pdf', ['id' => $id_group  ]) }}" class="btn-n-small btn-n-danger-outline"  style="font-size: 15px"><i class="fas fa-download"></i><b>PDF</b></a>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="w-100">
                <input type="text" wire:model="search" class="form-control" id="exampleFormControlInput1" placeholder="Busca por cedula o nombre los matriculados a este grupo." >
            </div>      
        </div>
        <div class="table-responsive p-0">
            <table class="table table-striped align-items-center mb-0" style="overflow:scroll;max-height:400px !important;">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $k = 0;
                    @endphp
                    @foreach ($list as $user)
                    @php
                        $k++;
                    @endphp
                        <tr class="text-center">
                            <td>{{ $k }}</td>
                            <td><span class="badge badge-sm bg-primary">{{ $user->nit }}</span></td>
                            <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                            <td><a class="modalGroupDelete pointer"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $user->id  }}"  ><i class="fas fa-trash"></i></a></td>
                        </tr>
                        @livewire('form-student-group-delete', ['group_id' => $id_group,'student_id' => $user->id, "nit" => $user->nit,"nombre" => $user->firstname." ".$user->lastname ], key($user->id))

                    @endforeach
                    
                    @if ($k == 0)
                        <tr class="text-center">
                            <td colspan="4">No existen estudiante matriculados al grupo.</td>
                        </tr>
                    @endif
                </tbody>
        
                <tfoot>
                                           
                </tfoot>
            </table> 
       </div>
    </div>
  
    
</div>
