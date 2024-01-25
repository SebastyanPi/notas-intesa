<div>
    <div class="container mt-4">
        <div class="row">
            
            
            @if ($exit == false)
            <div class="col-md-8">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Programa : </span>
                    
                    <select class="form-control text-center" wire:model="program" name="" id="">
                        <option value="0" class="text-danger"> << Elije el programa para matricular estudiantes >> </option>
                        @foreach ($programs as $item)
                            <option value="{{ $item->id }}">{{ $item->name_program() }}</option>
                        @endforeach
                    </select>
                  </div>
            </div>

                <div class="col-md-4">
                    <button wire:click="listGroup" class="btn btn-primary"><i class="fas fa-search pl-2"></i></button>
                </div>

                <div>
                    @if ($group != "")
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Horario</th>
                                <th>Grupo</th>
                                <th># Estudiantes</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($group) == 0)
                                <tr>
                                    <th class="text-center" colspan="5">No tiene ningun grupo.</th>
                                </tr>
                            @endif
                                @foreach ($group as $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td class="text-center">{{ $item->schedule->name }}</td>
                                    <td class="text-center"><b>{{ $item->code }}</b></td>
                                    <td class="text-center"><b>{{ count($item->students) }}</b></td>
                                    <td class="text-center"> <button class="btn btn-sm btn-n-primary" wire:click="seleccionado({{ $item->id }})" ><i class="fas fa-check-double"></i></button></td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>

            @else

            <h6>
                <span class="badge badge-sm bg-n-orange"> Programa</span>
                  {{ $group_select->program->name_program() }} <br />
                <span class="badge badge-sm bg-n-orange"> Horario</span>
                  <b> {{ $group_select->schedule->name }} </b><br />
                <span class="badge badge-sm bg-n-orange"> Grupo</span>
                  <b> {{ $group_select->code }} </b><br />
            </h6>

            @endif

            
            
        </div>
        <a href="{{ route('student.index') }}" class="btn btn-sm btn-n-primary mt-2"> <i class="fas fa-times"></i> Cerrar </a>
    </div>
</div>
