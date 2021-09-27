<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    protected $guarded = ['id'];

    use HasFactory;

    //Relacion uno a uno inversa
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }    
}
