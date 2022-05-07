<?php

namespace Modules\Car\Entities;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [];


    public function terms(){
        return $this->hasMany(Composant::class);
    }
}
