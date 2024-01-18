<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\User;
use App\Models\qualification;
use Illuminate\Support\Facades\DB;

class ShowListStudentQualification extends Component
{
    public $search = "";
    public $seleccionado = "";
    public $module_id;
    public $group_id;

    public function updated(){
        if($this->seleccionado != ""){
            qualification::create([
                'user_id' => $this->seleccionado,
                'module_id' => $this->module_id,
                'group_id' => $this->group_id,
                'note1' => 00,
                'note2' => 00,
                'note3' => 00,
                'fails' => 0,
                'is_group' => '0',
            ]);
            $this->emit('StudentAdded');
            $this->seleccionado = "";
        }

    }

    public function render()
    {
        if($this->search == ""){
            $json = DB::select("SELECT users.nit, users.firstname, users.lastname ,users.id, users.username FROM (SELECT * FROM qualifications WHERE group_id = '$this->group_id' AND module_id = '$this->module_id')  AS groupito RIGHT JOIN users ON users.id =  groupito.user_id INNER JOIN model_has_roles ON model_has_roles.model_id = users.id WHERE groupito.user_id IS NULL AND model_has_roles.role_id = 2");

        }else{
            $json = DB::select("SELECT * FROM ( SELECT users.nit, users.firstname, users.lastname ,users.id, users.username FROM (SELECT * FROM qualifications WHERE group_id = '$this->group_id' AND module_id = '$this->module_id')  AS groupito RIGHT JOIN users ON users.id =  groupito.user_id INNER JOIN model_has_roles ON model_has_roles.model_id = users.id WHERE groupito.user_id IS NULL AND model_has_roles.role_id = 2 ) AS consulta2 WHERE consulta2.username LIKE '%".$this->search."%' OR consulta2.nit LIKE '%".$this->search."%' OR consulta2.firstname LIKE '%".$this->search."%' OR consulta2.lastname LIKE '%".$this->search."%'");
        }
        return view('livewire.show-list-student-qualification', compact('json'));
    }
}




