<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'program_id'
    ];
    
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function qualifications()
    {
        return $this->hasMany(qualification::class);
    }


}
