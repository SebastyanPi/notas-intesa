<?php

namespace App\Http\Livewire;
use App\Models\GroupStudent;
use App\Models\qualification;
use Livewire\Component;

class FormStudentGroupDelete extends Component
{
    public $group_id, $student_id, $showText = false,$nit = "", $nombre = "" ;

    public function updated(){
        if($this->showText != false){
            qualification::where("user_id", $this->student_id)->where("group_id", $this->group_id)->delete();
            GroupStudent::where("user_id", $this->student_id)->where("group_id", $this->group_id)->delete();
            $this->student_id = "";
            $this->showText = false;
            $this->emit('StudentAdded');

        }
    }

    public function render()
    {
        return view('livewire.form-student-group-delete');
    }
}
