<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class TeacherList extends Component
{
    public $search = "", $users; 

    public function mount(){
        $this->users = User::role('Profesor')->orderBy('id', 'desc')->get();
        Cache::put('teacher', $this->users);
    }

    public function updated(){

        if($this->search != ""){
            /*$this->users = User::role('Profesor')->where('nit','LIKE','%'.$this->search.'%')->
            orWhere('username','LIKE','%'.$this->search.'%')->
            orWhere('firstname','LIKE','%'.$this->search.'%')->
            orWhere('lastname','LIKE','%'.$this->search.'%')->get();*/
            $this->users = DB::select(" SELECT * FROM (SELECT * FROM users WHERE nit LIKE '%".$this->search."%' OR username LIKE '%".$this->search."%' OR firstname LIKE '%".$this->search."%' OR lastname LIKE '%".$this->search."%' OR email LIKE '%".$this->search."%') AS grupito INNER JOIN model_has_roles ON model_has_roles.model_id = grupito.id WHERE model_has_roles.role_id = 3");
        }else{
            $users = "";
            if (Cache::has('teacher')) { //Si tengo almacenado esto en cache devuelveme el valor
                # code...
                $users = Cache::get('teacher');
            }else{
                $users = User::role('Profesor')->orderBy('id', 'desc')->get();
                Cache::put('teacher', $users);
            }
            $this->users = $users;
            
        }
    }

    public function render()
    {
        return view('livewire.teacher-list');
    }
}
