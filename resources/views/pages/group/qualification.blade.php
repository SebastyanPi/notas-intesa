@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Calificación'])

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <div class="mb-3">
                            <h5 class="mb-1">
                                <a class="text-primary" href="{{ route('group.add',['id'=> $group->id]) }}"><i class="ni ni-bold-left"></i><i class="ni ni-bold-left"></i></a> 
                                @switch($group->program->type)
                                    @case('Tecnico')
                                        Tecnico Laboral
                                        @break
                                    @case('Diplomado')
                                        Diplomado
                                        @break
                                    @case('Curso')
                                        Curso
                                        @break
                                    @case('Seminario')
                                        Seminario
                                        @break
                                    @default 
                                @endswitch 
                                
                                
                                
                                {{ $group->program->name }} <span class="badge badge-sm badge-n-primary"><i class="fas fa-clock"></i>  {{  $group->schedule->name }}</span> 
                            </h5>
                            <small>En esta Sección puedes gestionar las calificaciones del modulo seleccionado.</small>
                        </div>
                        
                        <div class="line-info">
                            <span class=""><i class="fas fa-layer-group"></i>Grupo : <b class="">{{ $group->code }}</b></span>
                            <span class="d-none"><i class="fas fa-user-graduate"></i>Numero de Matriculados :  <b class="">{{ count($group->students) }} </b></span>
                            <span class=""><i class="fas fa-book"></i>Modulo :  <b class="">{{  $module->name  }} </b></span>
                            <span class=""><i class="fas fa-book"></i>Modulo :  <b class="">{{  $module->user->names()  }} </b></span>
                        </div>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('list-qualification', ['module_id' => $module->id, 'group_id' =>$group->id], key($group->id))

        <!-- Modal -->
<div class="modal fade" id="staticBackdrop"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header" style="display: block">
            <div class="">
                <h5 class="mb-2"><i class="fas fa-users"></i> Agregar Estudiantes</h5>
                
                <p>Nombre del Programa : <b>Tecnico Laboral {{ $group->program->name }} </b></p> 
            </div>
            <div>    
         
                <div class="line-info mt-2">
                    <span class=""><i class="fas fa-clock"></i>  {{  $group->schedule->name }}</span> 
                    <span class="" ><i class="fas fa-stream"></i> Grupo: {{ $group->code }}</span>
                    <span class="" ><i class="fas fa-book"></i> Modulo: {{ $module->name }}</span>
                </div>
            </div>

          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <form method="POST" action="" >
                @csrf
                @livewire('show-list-student-qualification', ["group_id" => $group->id, "module_id" => $module_id])
        </div>
    
            </form>
      </div>
    </div>
  </div>
  

    <script>
    $(".sidenav").remove();
    $(document).on('keypress','.puntos',function(event){
        var e = $(this);
        var valor = e.val();
        //if(event.which != 8){
                if(valor.length == 1){
                    var cadena = valor+".";
                    e.val(cadena);
                }else if(valor[1] == "." && camp[2] == undefined){
                    if(valor <= 5.0 ){
                        var cadena;
                        cadena = valor[0]+"."+0;
                        e.val(cadena);
                    }else{
                        e.val("");
                    }
                }else if(valor.length > 2 ){
                    return false;
                }
        //}
    });


    $('#visible').click(()=>{
        $(':checkbox').each(function() {
            this.checked = true;
        });
    });

    $('#invisible').click(()=>{
        $(':checkbox').each(function() {
            this.checked = false;
        });
    });

    $(".buttonAccion").click(()=>{
        var Exist = false;
            $( ".campi" ).each(function() {
                let nota = parseFloat($(this).val());
                if(nota > 5){
                    Exist = true;
                }
            });
        if(!Exist){
            $(".envioQualification").click();
        }
    });

   

    function NotaFinal(){
    var elemento;
    $(document).on('keyup','.sum',function(){
        elemento = $(this);
        var id = elemento.attr('atr');
        var num = elemento.attr('lol');
        var j = campoVacio($(elemento).val());
        if(j > 5.0){
            elemento.css("color","red");

        }else{
            elemento.css("color","black");
       
        } 
        if(num == 1){
            sum = j*0.20; 
            var camp2 =  ValidarCamp($("#camp2_"+id).val())*0.30;
            var camp3 =  ValidarCamp($("#camp3_"+id).val())*0.50;
            var sum = parseFloat(sum)+parseFloat(camp2)+parseFloat(camp3);
            var k = redondeo(sum);
            $("#final_"+id).val(k);
            if(k < 3.5 || k > 5.0){
                $("#final_"+id).css('color','red');
            }else{
                $("#final_"+id).css('color','black');
            }
        }
        else if(num == 2){
            sum = j*0.30; 
            var camp1 =  ValidarCamp($("#camp1_"+id).val())*0.20;
            var camp3 =  ValidarCamp($("#camp3_"+id).val())*0.50;
            var sum = parseFloat(sum)+parseFloat(camp1)+parseFloat(camp3);
            var k = redondeo(sum);
            $("#final_"+id).val(k);
            if(k < 3.5 || k > 5.0){
                $("#final_"+id).css('color','red');
            }else{
                $("#final_"+id).css('color','black');
            }
        }else{
            sum = j*0.50;
            var camp1 =  ValidarCamp($("#camp1_"+id).val())*0.20;
            var camp2 =  ValidarCamp($("#camp2_"+id).val())*0.30;
            var sum = parseFloat(sum)+parseFloat(camp1)+parseFloat(camp2);
            var k = redondeo(sum);
            $("#final_"+id).val(k);
            if(k < 3.5 || k > 5.0){
                $("#final_"+id).css('color','red');
            }else{
                $("#final_"+id).css('color','black');
            }
        }
    });
    }
    NotaFinal();

    function capturarEnter(){
        $("body").keypress(function(e) {
            if(e.which == 13) {
                e.preventDefault();
            }
      });
    }
    capturarEnter();

    function ValidarCamp(camp){
        if(camp == ""){
            return 0;
        }else{
            return camp;
        }
    }

    function campoVacio(camp){
    var camp = camp.toString(); 
    if(camp == 0){
        return 0;
    }else if(camp.length == 2 && camp[1] == "." && camp[2] == undefined){
        return camp[0]+"."+0;
    }else{
        return camp;   
    }
}

function redondeo(frase){
    var frase = frase.toString();
    if(frase.length > 3){
        var cadena = frase.slice(2);
        var cade = cadena[0]+"."+cadena.slice(1);
        cade = Math.ceil(cade,1);
        if(cade == 10){
            return (parseFloat(frase[0])+1)+"."+0; 
        }else{
            return frase[0]+"."+cade;
        }   

    }else if(frase.length == 1){
        return frase+"."+0;
    }
    else{
        return frase;
    }
} 


        /*document.addEventListener("keypress", function(event) {
            var clases = event.target.classList;
            var is_punto = false;
            for (let index = 0; index < clases.length; index++) {
                const clase = clases[index];
                if(clase == "puntos"){
                    is_punto = true;
                    break;
                }
            }
            if(is_punto){
                var e = event;
                //console.log(e.target.id);
                //var valor = e.target.value();
                var object = e.srcElement;
                var valor = object.value;
                console.log(object);
                //if(event.which != 8){
                        if(valor.length == 1){
                            var cadena = valor+".";
                            //e.val(cadena);
                            object.value = valor;
                        }else if(valor[1] == "." && camp[2] == undefined){
                            if(valor <= 5.0 ){
                                var cadena;
                                cadena = valor[0]+"."+0;
                                //e.val(cadena);
                                object.value = cadena;
                            }else{
                                e.val("");
                                object.value = "";
                            }
                        }else if(valor.length > 2 ){
                            return false;
                        }
                //}
            }
        });

    /*const input = document.querySelector("input");
    input.addEventListener("keypress", logKey);

        /*$(document).on('keypress','.puntos',function(event){
        
    });*/

    /*function logKey(event){
        var e = event;
        var valor = e.val();
        //if(event.which != 8){
                if(valor.length == 1){
                    var cadena = valor+".";
                    e.val(cadena);
                }else if(valor[1] == "." && camp[2] == undefined){
                    if(valor <= 5.0 ){
                        var cadena;
                        cadena = valor[0]+"."+0;
                        e.val(cadena);
                    }else{
                        e.val("");
                    }
                }else if(valor.length > 2 ){
                    return false;
                }
        //}
    }*/

    </script>
@endsection


