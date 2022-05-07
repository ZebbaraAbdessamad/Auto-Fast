<?php

namespace Modules\Car\Entities;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{ 
    use SoftDeletes;
    protected $slugField     = 'slug';
    protected $slugFromField = 'title';
    protected $fillable = []; 
  protected $dates=['deleted_at'];

  //  protected $primaryKey = 'ID';

  public function composants()
  {
    return $this->hasMany(CarComposant::class);
  }

 

}
