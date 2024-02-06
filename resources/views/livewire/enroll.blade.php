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
                    <button wire:click="listGroup" id="click" class="btn-n btn-primary"><i class="fas fa-search pl-2"></i></button>
                  </div>
            </div>

                <div class="col-md-4">
                   
                </div>

                <div>
                    @if ($group != "")
                    <table class="table table-striped" id="tabla">
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

           <div class="col-md-6">
                <h6>
                    <span class="badge badge-sm bg-primary"> Programa</span>
                    {{ $group_select->program->name_program() }} <br />
                    <span class="badge badge-sm bg-primary"> Horario</span>
                    <b> {{ $group_select->schedule->name }} </b><br />
                    <span class="badge badge-sm bg-primary"> Grupo</span>
                    <b> {{ $group_select->code }} </b><br />
                </h6>
           </div>

            <div class="col-md-6">
                <a href="{{ route('student.index') }}" class="btn-n btn-sm btn-n-primary mt-2 mb-2 d-none"> <i class="fas fa-times"></i> Cerrar </a>
            </div>

            @endif

            
            
        </div>
      <div class="d-flex justify-content-center d-none" id="carga">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
          </div> 
      </div>
          <br>

       
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        
                    </thead>
                    <tbody>
                        <tr class="text-center" >

                            <td class="bg-n-orange text-white border-n-line">
                                <i class="fas fa-arrow-right"></i>
                            </td>
        
                            <td class="border-n-line">
                                <a href="{{ route('users.edit', ['id' => $user_id, 'before' => 'student']) }}"><i class="fas fa-user-edit"></i> Editar Estudiante</a>
                                
                            </td>

                            <td class="border-n-line">
                                <a href="{{  route('user.register','student') }}"> <i class="fas fa-user-plus"></i>  Crear </a>
                               
                            </td>
        
                            <td class="border-n-line">
                                <a href="{{  route('student.index')  }}"> 
                                    <i class="fas fa-user-friends"></i> Listar
                                </a>
                               
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>


    <script>
        $('#click').on('click', function(){
            $("#tabla").addClass('d-none');
            $("#carga").removeClass('d-none');
            setTimeout(() => {
                $("#carga").addClass('d-none');
                $("#tabla").removeClass('d-none');
            }, 1000);
        });
    </script>
</div>
