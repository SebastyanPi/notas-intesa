<?php

namespace App\Http\Livewire;
use App\Models\qualification;
use Livewire\Component;

class FormStudentDeleteQualification extends Component
{
    public $qualification_id,$student_id, $nit, $nombre, $delete = false;

    public function updated(){
        if($this->delete != false){
            qualification::where('id',$this->qualification_id)->delete();
            $this->showText = false;
            $this->emit('StudentAdded');
        }
    }

    public function render()
    {
        return view('livewire.form-student-delete-qualification');
    }
}
