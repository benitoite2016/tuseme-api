<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjumbeController extends Controller
{
    //
     public function index(){
        $ujumbes = Ujumbe::all();

        return $ujumbes;
    }
}
