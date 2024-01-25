<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Program;
use App\Models\group;
use App\Models\GroupStudent;

class Enroll extends Component
{

    public $user_id, $groups, $program = "", $programs = "", $group = "", $exit = false, $group_select;


    public function listGroup(){
        if($this->program != ""){
            //$this->emit('Enroll');
            $this->group = group::where('program_id', $this->program)->get();
            
            $this->mount();
        }
    }

    public function seleccionado($id){
        GroupStudent::create([
            'group_id' => $id,
            'user_id' => $this->user_id,
        ]);
        $this->group_select = group::where('id', $id)->first();
        $this->exit = true;
        $this->mount();

    }

    public function mount(){
        $this->programs = Program::all();
    }

    public function render()
    {
        return view('livewire.enroll');
    }
}
