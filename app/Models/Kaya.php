<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kaya extends Model
{
    //
    protected $fillable = ['name','details'];

    public  function users(){
        return $this->hasMany(User::class);
    }


}
