<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetitionRequest;
use App\Models\Petition;
use Illuminate\Http\Request;

class PetitionController extends Controller
{
    //

    public function index(Request $request){

        $petitions = Petition::all();

        return $petitions;
    }

    public function store(StorePetitionRequest $request){

        $petition = new Petition();
        $petition->title = $request->title;
        $petition->description = $request->description;
        $petition->user()->associate($request->user_id);
        $petition->petitionCategory()->associate($request->petition_category_id);

        $petition->save();
    }
}
