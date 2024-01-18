@extends('layouts.pdf.app')

@section('header')
Grupos por Programas
@endsection

@section('content')
<span style="display:block;text-align: center; font-size:20px !important;"> <b>Grupos por Programa</b></span>
<div>
    <br>
    <span style="font-size:13px">Nombre del Programa : <b>{{ $program->name_program() }} </b></span> <br>
    <span style="font-size:13px">Fecha : <b>{{ $fechaHoy }} </b></span><br>
    <br>
</div>
    <table>
        <thead>
            <tr style="font-weight: bold">
                <td>ID</td>
                <td class="bg-n-green-suave">Grupo</td>
                <td colspan="2">Horario</td>
                <td colspan="2">Docente Encargado</td>
                <td> # Estudiantes</td>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach ($groups as $item)
            @php $i++; @endphp
                <tr>
                    <td>{{ $i }}</td>
                    <td class="bg-n-green-suave">{{ $item->code }}</td>
                    <td colspan="2">{{ $item->schedule->name  }}</td>
                    <td colspan="2">{{ $item->user->names()  }}</td>
                    <td colspan="2">{{ count($item->students) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection