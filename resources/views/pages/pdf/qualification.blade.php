@extends('layouts.pdf.app')

@section('header')
    Calificaciones
@endsection

@section('content')
<span style="display:block;text-align: center; font-size:20px !important;"> <b>NOTAS</b></span>
<div>
    <br>
    <span style="font-size:13px">Nombre del Programa : <b>{{ $group->program->name_program() }} </b></span> <br>
    <span style="font-size:13px">Horario : <b>{{ $group->schedule->name }} </b></span><br>
    <span style="font-size:13px">Grupo : <b>{{ $group->code }} </b></span><br>
    <span style="font-size:13px">Fecha : <b>{{ $fechaHoy }} </b></span><br>
    <br>
</div>
    <table>
        <thead>
            <tr style="font-weight: bold">
                <td>ID</td>
                <td colspan="3">Nombre Completo</td>
                <td class="bg-n-green-suave">Actitudinal (20%)</td>
                <td>Conceptual (30%)</td>
                <td class="bg-n-green-suave">Procedimental (50%)</td>
                <td>Definitiva</td>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach ($qualifications as $item)
            @php $i++; @endphp
                <tr>
                    <td @if ($item->is_group == 0)
                        class="bg-n-gray"
                    @endif>{{ $i }}</td>
                    <td @if ($item->is_group == 0)
                        class="bg-n-gray"
                    @endif colspan="3">{{ $item->user->names();  }}</td>
                    <td class="bg-n-green-suave">{{ $item->note1(); }}</td>
                    <td @if ($item->is_group == 0)
                        class="bg-n-gray"
                    @endif>{{ $item->note2(); }}</td>
                    <td class="bg-n-green-suave">{{ $item->note3(); }}</td>
                    <td @if ($item->definitive() >= 3.5)
                        class="bg-n-success font-14"
                        @else
                        class="bg-n-danger font-14"
                    @endif>{{ $item->definitive(); }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection