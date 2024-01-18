<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\GroupStudent;
use Illuminate\Support\Facades\DB;

class ParentListGroup extends Component
{
    public $id_group, $group, $search = "", $seleccionado = "";

    public function updated(){
        if($this->seleccionado != ""){
            GroupStudent::create([
                'group_id' => $this->id_group,
                'user_id' => $this->seleccionado,
            ]);

            $this->emit('StudentAdded');
            $this->seleccionado = "";
            $this->search = "";
        }

    }

    public function render()
    {
        if($this->search == ""){
            $json = DB::select("SELECT users.nit, users.firstname, users.lastname ,users.id, users.username FROM (SELECT * FROM group_students WHERE group_id = '$this->id_group')  AS groupito RIGHT JOIN users ON users.id =  groupito.user_id INNER JOIN model_has_roles ON model_has_roles.model_id = users.id WHERE groupito.user_id IS NULL AND model_has_roles.role_id = 2");
        }else{

            $json = DB::select("SELECT * FROM ( SELECT users.nit, users.firstname, users.lastname ,users.id, users.username FROM (SELECT * FROM group_students WHERE group_id = '$this->id_group')  AS groupito RIGHT JOIN users ON users.id =  groupito.user_id INNER JOIN model_has_roles ON model_has_roles.model_id = users.id WHERE groupito.user_id IS NULL AND model_has_roles.role_id = 2 ) AS consulta2 WHERE consulta2.username LIKE '%".$this->search."%' OR consulta2.nit LIKE '%".$this->search."%' OR consulta2.firstname LIKE '%".$this->search."%' OR consulta2.lastname LIKE '%".$this->search."%'");
        }
        return view('livewire.parent-list-group', compact('json'));
    }
}
