<?php

namespace App\Http\Livewire;

use App\Models\Module;
use App\Models\assign_module;
use App\Models\User;
use Livewire\Component;


class AssignModule extends Component
{

    public $id_group, $group, $id_program, $list, $checked, $teacher, $teacherSelected = 1;

    public function save($module_id){
        $itemrows = assign_module::where('module_id', $module_id)->where('group_id',$this->id_group)->count();
        $item = assign_module::where('module_id', $module_id)->where('group_id',$this->id_group)->first();
        if($itemrows > 0){
            $item->user_id = $this->teacherSelected;
            $item->save();
        }else{
            assign_module::create([
                'module_id' => $module_id,
                'group_id' => $this->id_group,
                'user_id' => $this->teacherSelected
            ]);
        }
        $this->teacherSelected = 1; 
        $this->mount();
    }

    public function mount(){
        $this->checked = [];
        $this->list = Module::where('program_id', $this->id_program)->get();
        foreach ($this->list as $key) {
           $item = assign_module::where('module_id', $key->id)->where('group_id',$this->id_group)->first();
           if(isset($item)){
                array_push($this->checked,[ 'module_id' => $key->id, 'user_id' => $item->user_id ]);
           }

        }
        $this->teacher = User::role('Profesor')->get();
    }

    public function render()
    {
        return view('livewire.assign-module');
    }
}
