<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class UserList extends Component
{

    public $search = "", $users; 

    public function mount(){
        $this->users = User::All();
    }

    public function updated(){

        if($this->search != ""){
            $this->users = User::where('nit','LIKE','%'.$this->search.'%')->
            orWhere('username','LIKE','%'.$this->search.'%')->
            orWhere('firstname','LIKE','%'.$this->search.'%')->
            orWhere('lastname','LIKE','%'.$this->search.'%')->get();
            //$this->users = DB::select("SELECT * FROM users WHERE nit LIKE '%".$this->search."%' OR username LIKE '%".$this->search."%' OR firstname LIKE '%".$this->search."%' OR lastname LIKE '%".$this->search."%' OR email LIKE '%".$this->search."%'");
        }else{
            $users = "";
            if (Cache::has('users')) { //Si tengo almacenado esto en cache devuelveme el valor
                # code...
                $users = Cache::get('users');
            }else{
                $users = User::All();
                Cache::put('users', $users);
            }
            $this->users = $users;
            
        }
    }

    public function render()
    {
        return view('livewire.user-list');
    }
}
