@extends('layouts.pdf.app')

@section('header')
    Listado de Estudiantes
@endsection

@section('content')
<span style="display:block;text-align: center; font-size:20px !important;"> <b>Listado de Estudiantes</b></span>
<div>
    <br>
    <span style="font-size:13px">Fecha : <b>{{ $fechaHoy }} </b></span><br>
    <br>
</div>
    <table>
        <thead>
            <tr style="font-weight: bold">
                <td>ID</td>
                <td class="bg-n-green-suave">Cedula</td>
                <td colspan="2" class="">Usuario</td>
                <td class="bg-n-green-suave" colspan="3">Nombre Completo</td>
                <td colspan="2">Email</td>
                <td>Estado</td>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach ($students as $item)
            @php $i++; @endphp
                <tr>
                    <td>{{ $i }}</td>
                    <td class="bg-n-green-suave">{{ $item->nit }}</td>
                    <td colspan="2" >@ {{ $item->username }}</td>
                    <td class="bg-n-green-suave" colspan="3">{{ $item->names();  }}</td>
                    <td colspan="2">{{ $item->email;  }}</td>
                    <td>{{ $item->state }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection