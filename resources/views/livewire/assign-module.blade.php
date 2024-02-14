<div>
    <div class="my-4">
        <b> <span class="badge bg-danger"><i class="fas fa-arrow-right"></i>Importante</span> Elije el Docente que deseas asignar!</b>
        <select class="form-control mt-2" name="" id="" wire:model="teacherSelected">
            <option value="1">Administrativo Intesa</option>
            @foreach ($teacher as $profe)
                <option  value="{{ $profe->id }}">{{ $profe->names() }}</option>    
            @endforeach
        </select>
    </div>
    
    <table class="w-100 table table-striped mt-4" id="tabla">
        <tbdoy>
            @foreach ($list as $item)
                <tr>
                    <td module="{{ $item->id }}"><b>Modulo . </b>{{ $item->name }}</td>
                    <td>
                        @php
                            $y = 0;

                        @endphp
                        @php
                            $found_key = array_search($item->id, array_column($checked, 'module_id'));
                        @endphp
                        @if ($found_key > -1 && $checked[$found_key]['user_id'] == 1)
                                <b>Docente. </b>Administrativo Intesa
                            @php
                                $y++;
                            @endphp
                        @else
                                @foreach ($teacher as $profe)
                                    @if ($found_key > -1 &&  $profe->id == $checked[$found_key]['user_id']) 
                                        
                                    <b>Docente. </b>{{ $profe->names() }}  
                                    @php
                                        $y++;
                                  
                                    @endphp                       
                                    @endif
                                 @endforeach
                        @endif
                       



                        @if ($y == 0)
                            <span class="badge bg-warning">Sin Asignar</span>
                        @else
                            
                        @endif
                    </td>
                    <td>
                        <button type="button" wire:click="save({{ $item->id }})" class="btn-n btn-n-primary btn-sm click">
                      
                            @if ($y == 0)
                                <i class="fas fa-paint-brush"></i> Asignar
                            @else
                                <i class="fas fa-sync"></i> Cambiar
                            @endif
                           
                        </button>
                    </td>
                    <td>
                        <a href="{{ route('group.qualification', ['id'=> $id_group, 'module_id' => $item->id]) }}" class="btn-n btn-n-informative"><i class="fas fa-upload"></i> Notas  </a>   
                    </td>
                </tr>
            @endforeach
        </tbdoy>
    </table>

    <div class="d-flex justify-content-center d-none" id="carga">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
          </div> 
      </div>


      <script>
        $('.click').on('click', function(){
            $("#tabla").addClass('d-none');
            $("#carga").removeClass('d-none');
            setTimeout(() => {
                $("#carga").addClass('d-none');
                $("#tabla").removeClass('d-none');
            }, 1000);
        });
    </script>
</div>
