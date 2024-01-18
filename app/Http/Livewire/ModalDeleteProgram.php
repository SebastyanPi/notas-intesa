<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalDeleteProgram extends Component
{
    public $module_id, $module_name, $program_id; 

    public function render()
    {
        return view('livewire.modal-delete-program');
    }
}
