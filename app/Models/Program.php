<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type'
    ];


    public function name_program(){
        $name = $this->attributes['name'];
        switch ($this->attributes['type']) {
            case 'Tecnico':
                $name = 'Tecnico Laboral '.$name; 
                break;
            case 'Diplomado':
                $name = 'Diplomado '.$name;
                break;
            case 'Curso':
                $name = 'Curso '.$name;
                break;
            case 'Seminario':
                $name = 'Seminario '.$name;
                break;
        }
        return $name;
    }
    
    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function groups()
    {
        return $this->hasMany(group::class)->orderBy('id', 'DESC');;
    }
}
