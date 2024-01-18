<div class="modal fade" id="staticBackdrop{{ $module_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Deseas eliminar este modulo?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h6>Modulo : <span>{{ $module_name }}</span></h6>
        </div>
        <form method="POST" action="{{ route('program.destroy', $module_id) }}">
            @csrf
            <input type="hidden" name="module_id" value="{{ $module_id }}">
            <input type="hidden" name="program_id" value="{{ $program_id }}">
            <div class="modal-footer">
                <button type="button" class="btn-n btn-n-informative close" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn-n btn-n-danger ">Si, Eliminar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
