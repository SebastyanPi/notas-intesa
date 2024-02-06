<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class StudentList extends Component
{
    public $search = "", $users; 

    public function mount(){
        $this->users = User::role('Estudiante')->orderBy('id', 'desc')->get();
        Cache::put('student', $this->users);
    }

    public function updated(){

        if($this->search != ""){
            /*$this->users = User::role('Profesor')->where('nit','LIKE','%'.$this->search.'%')->
            orWhere('username','LIKE','%'.$this->search.'%')->
            orWhere('firstname','LIKE','%'.$this->search.'%')->
            orWhere('lastname','LIKE','%'.$this->search.'%')->get();*/
            $this->users = DB::select(" SELECT * FROM (SELECT * FROM users WHERE nit LIKE '%".$this->search."%' OR username LIKE '%".$this->search."%' OR firstname LIKE '%".$this->search."%' OR lastname LIKE '%".$this->search."%' OR email LIKE '%".$this->search."%') AS grupito INNER JOIN model_has_roles ON model_has_roles.model_id = grupito.id WHERE model_has_roles.role_id = 2");
        }else{
            $users = "";
            if (Cache::has('student')) { //Si tengo almacenado esto en cache devuelveme el valor
                # code...
                $users = Cache::get('student');
            }else{
                $users = User::role('Estudiante')->orderBy('id', 'desc')->get();
                Cache::put('student', $users);
            }
            $this->users = $users;
            
        }
    }

    public function render()
    {
        return view('livewire.student-list');
    }
}
