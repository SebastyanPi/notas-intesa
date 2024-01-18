@extends('role_student.layout.app')

@section('content')

    <div class="container-fluid mt-4">
      <div>
        <i class="fas fa-hand-sparkles"></i> Bienvenido/a <b> {{ auth()->user()->names() }}.</b>
        <br />
        <h5 class="d-none">{{ auth()->user()->email }}</h5>
      </div>

      <div class="mt-2">

        <style>
          table {
            border-collapse: collapse;
            width: 100%;

          }

          th, td {
            border: 1px solid rgb(255, 255, 255);
            padding: 8px;
            background-col
            or: #f5f5f5 !important;
          }

          

          
        </style>


        

        

        @foreach (auth()->user()->group_student as $item)


        <br>
        
          <table class="mb-3">
            <thead class="d-none">
              <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Modulo</th>
                <th scope="col">Nota 1</th>
                <th scope="col">Nota 2</th>
                <th scope="col">Nota 3</th>
                <th scope="col">Definitiva</th>
              </tr>
            </thead>
            <tbody>

              <tr class="text-center border-n-line">
                <td class="border-n-line" colspan="6"><span class="badge text-bg-primary bg-primary">Programa </span> <b>{{ $item->group->program->name_program() }}</b></td>
              </tr>
              <tr class="text-center">
                <td class="border-n-line" colspan="6"><span class="badge text-bg-primary bg-primary">Horario </span> {{ $item->group->schedule->name }}</td>
              </tr>
              <tr class="text-center">
                <td class="border-n-line" colspan="6"><span class="badge text-bg-primary bg-primary">Codigo </span> {{ $item->group->code }}</td>
              </tr>

              @php
                $i = 0;
              @endphp

              @foreach (auth()->user()->qualifications as $row)

                @if ($item->group_id == $row->group_id &&  $row->visible == 1)

                @php
                    $i++;
                @endphp

                <tr class="text-center bg-n-aquarela">
                  <td colspan="6">{{ $row->module->name }}</td>
                </tr>

                <tr class="text-center" style="font-size: 13px;">
                  <td>Actitudinal (20%)</td>
                  <td>Conceptual (30%)</td>
                  <td>Procedimental (50%)</td>
                  <td>Definititva</td>
                </tr>

                  <tr class="text-center" style="color: #000;">
                    <td class="bg-n-gray">{{ $row->note1() }}</td>
                    <td class="bg-n-gray-02">{{ $row->note2() }}</td>
                    <td class="bg-n-gray">{{ $row->note3() }}</td>
                    <td @if ($row->definitive() < 3.5)
                          class="bg-n-danger-02"
                        @else
                        class="bg-n-success-02"
                    @endif><b>{{ $row->definitive() }}</b></td>
                  </tr> 
                @endif


                   
              @endforeach

              @if ($i == 0)
                <tr class="text-center bg-n-aquarela">
                  <td colspan="6">No existen notas disponibiles.</td>
                </tr>
              @endif

            </tbody>
          </table>

          <style>
            
          </style>
            
        @endforeach


      </div>
    </div>      

@endsection