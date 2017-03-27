<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    //
    protected $fillable = ['title','description'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function petitionCategory(){
        return $this->belongsTo(PetitionCategory::class);
    }
}
