<?php

namespace App\Http\Livewire;

use App\Models\group;
use App\Models\Module;
use App\Models\qualification;
use App\Models\GroupStudent;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ListQualification extends Component
{
    public $group_id, $module_id, $qualifications;
    protected $listeners = ['StudentAdded' => 'ReloadData'];

    public function ReloadData(){
        return $this->mount();
    }

    public function mount(){
        $ExistQualification = qualification::where('module_id', $this->module_id)->where('group_id', $this->group_id)->get();
        $EstudiantesXGrupo = GroupStudent::where('group_id',$this->group_id)->get();
        if(count($ExistQualification) < count($EstudiantesXGrupo)){
            foreach ($EstudiantesXGrupo as $student) {
                $arrays = qualification::where('module_id', $this->module_id)
                    ->where('group_id', $this->group_id)->where('user_id', $student->user_id)->get();
                if(count($arrays) == 0){
                    qualification::create([
                        "user_id" => $student->user_id,
                        "module_id" => $this->module_id,
                        "group_id" => $this->group_id,
                        "note1" => 00,
                        "note2" => 00,
                        "note3" => 00,
                        "fails" => 00,
                    ]);
                }
                
            }
        }
        $this->qualifications = qualification::where('module_id', $this->module_id)->where('group_id', $this->group_id)->get();
    }

    public function render()
    {
        return view('livewire.list-qualification');
    }
}
