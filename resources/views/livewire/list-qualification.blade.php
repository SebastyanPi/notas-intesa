<div>
    <div class="container-fluid mt-2">
        <form method="POST" action="{{ route('group.qualification.store', ['id'=> $group_id, 'module_id' => $module_id]) }}">
            @csrf
            <input type="hidden" name="module_id" value="{{ $module_id }}">
            <div class="card mb-4">

               
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-end">
                        <div>
                            <span class="btn-n-small btn-n-informative buttonAccion"  style="font-size: 15px"><i class="fas fa-save"></i> Guardar</span>
                            <span data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn-n-small btn-n-primary"  style="font-size: 15px"><i class="fas fa-users"></i></span>
                            <span id="visible" class="btn-n-small btn-n-primary"  style="font-size: 15px"><i class="fas fa-eye"></i></span>
                            <span id="invisible" class="btn-n-small btn-n-primary"  style="font-size: 15px"><i class="fas fa-eye-slash"></i></span>
                            <a target="__blank" href="{{ route('group.qualification.pdf', ['id' => $group_id , 'module_id' => $module_id ]) }}" class="btn-n-small btn-n-danger-outline"  style="font-size: 15px"><i class="fas fa-download"></i><b>PDF</b></a>
                        </div>
                    </div>

                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estudiante</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nota Actitudinal (20%)</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nota Conceptual (30%)</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nota Procedimental (50%)</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Definitiva</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fallas</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Visible</th>
                                <th></th>
                            </tr>
                        </thead>
                            <tbody>
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($qualifications as $item)
                            @php
                                $i++;
                                
                                $nota1 = "";
                                $nota2 = "";
                                $nota3 = "";
                                $fails = "";
                                $definitive = "";

                            @endphp
                        <tr @if ($item->is_group == 0)
                            class="bg-n-gray"
                        @endif>
                            <td>{{ $i }}</td>
                           <td>
                            <span class="badge badge-sm bg-primary">{{ $item->user->nit }}</span>
                           </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $item->user->firstname }}</h6>
                                        <p class="text-xs text-secondary mb-0">{{ $item->user->lastname }}</p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input value="{{  $item->note1();  }}" type="text" class="form-control form-control-sm text-center puntos sum campi inputkey" style="font-size:15px;" id="camp1_{{$i}}" name="camp1_{{$i}}" atr="{{$i}}" lol="1"   >
                                <input type="hidden" name="user_{{$i}}" value="{{ $item->user_id }}">
                            </td>
                            <td class="align-middle text-center text-sm">
                                <input value="{{  $item->note2();  }}" type="text" class="form-control form-control-sm text-center puntos sum campi inputkey" style="font-size:15px;" id="camp2_{{$i}}" name="camp2_{{$i}}" atr="{{$i}}" lol="2"  >
                            </td>
                            <td class="align-middle text-center">
                                <input value="{{  $item->note3();  }}" type="text" class="form-control form-control-sm text-center puntos sum campi inputkey" style="font-size:15px;" id="camp3_{{$i}}" name="camp3_{{$i}}" atr="{{$i}}" lol="3" >
                            </td>
                            <td class="text-center" >
                                <input @if ($item->definitive() < 3.5)
                                    style="color:red;font-size:15px;"
                                @endif value="{{  $item->definitive(); }}" type="text" readonly class="form-control fin form-control-sm text-center puntos sum" style="font-size:15px;" id="final_{{$i}}"  >
                            </td>

                            <td class="text-center" >
                                <input value="{{ $item->fails }}" type="text" class="form-control fin form-control-sm text-center inputkey" style="font-size:15px;" name="fails_{{$i}}" >
                            </td>

                            <td class="text-center">
                                <input type="checkbox" @if ($item->visible == 1)
                                    checked="true"
                                @else
                                    NOchecked=""
                                @endif 
                                class="form-radio-input visible{{$i}}" id="visible{{ $i }}" name="visible{{ $i }}" value="acepto">
                            </td>
                            <td>
                                @if ($item->is_group == 0)
                                    <a class="pointer" data-bs-toggle="modal" data-bs-target="#qualidelete{{ $item->user->id }}"><i class="fas fa-trash-alt"></i></a>
                                @endif
                            </td>
                        
                        </tr>
                        @endforeach
                    
                    
                            </tbody>
                        </table>
                    </div>
                </div>
                    
            </div>
                <input type="hidden" id="cantidad" value="{{ $i }}">
                <button type="submit" class="btn-n btn-n-primary d-none envioQualification">Guardar</button>
               
        </form>
    </div>

    @foreach ($qualifications as $item)
        @if ($item->is_group == 0)
            @livewire('form-student-delete-qualification', ['qualification_id' => $item->id ,'student_id' => $item->user->id, 'nit' => $item->user->nit,'nombre' => $item->user->names() ], key($item->id))
        @endif
    @endforeach
</div>

<script>
    $(".EliminarItem").click((event) =>{
        $(".close").click();
    })
</script>
