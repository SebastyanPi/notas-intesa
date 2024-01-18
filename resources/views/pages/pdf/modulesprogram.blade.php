@extends('layouts.pdf.app')

@section('header')
Grupos por Programas
@endsection

@section('content')
<span style="display:block;text-align: center; font-size:20px !important;"> <b>Modulos por Programa</b></span>
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
                <td colspan="3" class="bg-n-green-suave">Modulo</td>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach ($modules as $item)
            @php $i++; @endphp
                <tr>
                    <td>{{ $i }}</td>
                    <td colspan="3" class="bg-n-green-suave">{{ $item->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection