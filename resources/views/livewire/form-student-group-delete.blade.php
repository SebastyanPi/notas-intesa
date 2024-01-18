<div class="modal fade" id="staticBackdrop{{ $student_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Deseas eliminar a este estudiante del curso?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Cuando eliminas al estudiante, eliminas todas las notas asignadas en los modulos de este programa.</p>
            <h6>Cedula : <span id="CedulaModal">{{ $nit }}</span></h6>
            <h6>Nombre : <span id="NombreModal">{{  $nombre  }}</span> </h6>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn-n btn-n-informative close" data-bs-dismiss="modal">Cerrar</button>
            <button wire:click="$set('showText', true)" type="button" class="btn-n btn-n-danger EliminarItem">Si, Eliminar</button>
        </div>
      </div>
    </div>
  </div>
</div>
