<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'program_id',
        'schedule_id',
        'user_id',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students(){
        return $this->belongsToMany(User::class, 'group_students');
    }


    public function schedule()
    {
        return $this->belongsTo(schedule::class);
    }

    public function qualifications()
    {
        return $this->hasMany(qualification::class);
    }
}
