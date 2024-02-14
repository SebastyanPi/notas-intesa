<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'module_id',
        'group_id',
        'note1',
        'note2',
        'note3',
        'fails',
        'is_group'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function group()
    {
        return $this->belongsTo(group::class);
    }

    public function convert_note($note){
        $nota_primer_termino = substr($note, 0, 1);
        $nota_segundo_termino = substr($note, -1, 1);
        $nota = $nota_primer_termino.".".$nota_segundo_termino;
        return $nota;
    }

    public function note1(){
        return $this->convert_note($this->attributes['note1']);
    }

    public function note2(){
        return $this->convert_note($this->attributes['note2']);
    }

    public function note3(){
        return $this->convert_note($this->attributes['note3']);
    }

    function round_up( $value, $precision ) { 
        $pow = pow ( 10, $precision ); 
        return ( ceil ( $pow * $value ) + ceil ( $pow * $value - ceil ( $pow * $value ) ) ) / $pow; 
    }

    public function definitive(){
        $def = ( ($this->attributes['note1']/10) * 0.2) + (($this->attributes['note2']/10)* 0.3) + (($this->attributes['note3']/10)* 0.5);
        return round($def*10)/10;
    }
}
