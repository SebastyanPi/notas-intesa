<div>
    <div>
        <div class="container-fluid my-3">
            <div class="mb-3 d-flex justify-content-end">
                <div>
                    <a href="{{ route('user.register','student') }}" id="invisible" class="btn-n-small btn-n-primary"  style="font-size: 15px"><i class="fas fa-plus"></i></a>
                    <a target="__blank" href="{{ route('student.index.pdf') }}" class="btn-n-small btn-n-danger-outline"  style="font-size: 15px"><i class="fas fa-download"></i><b>PDF</b></a>
                </div>
            </div>

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
                            ID
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                            Cedula</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                            Usuario</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                            Nombre Completo</th>
                        <th
                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                            Email</th>
                         <th
                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                            Contraseña</th>
                        <th
                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                            Estado</th>
                        <th
                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder ">
                            </th>
                            
                        
                    </tr>
                </thead>
                <tbody>
                    @php
                        $k = 0;
                    @endphp
                    @foreach ($users as $item)

                    @php
                        $k++;
                    @endphp
                    <tr>
                        <td class="text-center">
                           <small> {{ $k }}</small>
                        </td>
                        <td class="text-center">
                            <b>
                                <span class="badge badge-sm bg-primary"> {{ $item->nit }}</span>
                            </b>
                        </td>
                        <td class="text-center">
                            <small>@ {{ $item->username }}</small>
                        </td>
                        <td class="text-center">
                            <span class="badge bg-n-aquarela">{{ $item->firstname }} {{ $item->lastname }}</span>
                        </td>
                        <td class="text-center">
                            <small>{{ $item->email  }}</small>
                        </td>

                        <td class="text-center">
                          <div class="n-tooltip"><b><small>Contraseña</small></b>
                            <span class="n-tooltiptext">{{  $item->password_verified_at  }}</span>
                          </div>
                        </td>

                        <td class="text-center">
                            <b>
                                <small
                                @if ($item->state == "activo")
                                    class="badge badge-sm bg-primary"
                                @else
                                    class="badge badge-sm bg-danger"
                                @endif
                                
                                > {{ $item->state }}</small>
                            </b>
                            
                        </td>
  
                        <td class="text-center">
                            <a href="{{ route('users.edit', ['id' => $item->id, 'before' => 'student']) }}"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    
                    @if ($k == 0)
                        <tr>
                            <td colspan="8" class="text-center">
                                <small> 
                                    No existen estudiantes agregados.
                                </small>
                            </td>
                        </tr>
                    @endif
    
                </tbody>
    
                <tfoot>
                   
                </tfoot>
            </table>
        </div>
    </div>    
</div>

