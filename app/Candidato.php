<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    //
    public function representante(){
        
        return $this->hasOne('App\Representante');
    }
}
