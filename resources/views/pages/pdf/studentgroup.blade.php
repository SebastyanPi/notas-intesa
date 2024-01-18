@extends('layouts.pdf.app')

@section('header')
    Estudiantes Matriculados
@endsection

@section('content')
<span style="display:block;text-align: center; font-size:20px !important;"> <b>Estudiantes Matriculados</b></span>
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
                <td class="bg-n-green-suave">Cedula</td>
                <td colspan="3">Nombre Completo</td>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach ($students as $item)
            @php $i++; @endphp
                <tr>
                    <td>{{ $i }}</td>
                    <td class="bg-n-green-suave">{{ $item->user->nit }}</td>
                    <td colspan="3">{{ $item->user->names();  }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection