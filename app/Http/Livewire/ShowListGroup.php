<?php

namespace App\Http\Livewire;
use App\Models\group;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ShowListGroup extends Component
{

    public $id_group, $list, $search = "", $num_student, $group;

    protected $listeners = ['StudentAdded' => 'ReloadData'];

    public function ReloadData(){
        //Cache::forget('StudentsXGroup');
        return $this->mount();
    }

    public function mount(){
        /*if (Cache::has('StudentsXGroup')) {
            $StudentsXGroup = Cache::get('StudentsXGroup');
        }else{
            $StudentsXGroup = group::find($this->id_group);
            Cache::put('StudentsXGroup', $StudentsXGroup);
        }*/
        $this->list = group::find($this->id_group);
        $this->list = $this->list->students;
    }

    public function updated(){
        if($this->search != ""){
            $this->list = DB::select("SELECT * FROM users INNER JOIN group_students ON users.id = group_students.user_id WHERE group_students.group_id = '".$this->id_group."' AND (users.username LIKE '%".$this->search."%' OR users.nit LIKE '%".$this->search."%' OR users.firstname LIKE '%".$this->search."%' OR users.lastname LIKE '%".$this->search."%')");
        }else{
            $this->list = group::find($this->id_group);
            $this->list = $this->list->students;
          
        } 
    }

    public function render()
    {
        return view('livewire.show-list-group');
    }
}
