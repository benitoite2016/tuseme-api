<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreReportRequest;
use App\Models\Report;

class ReportController extends Controller
{

    public function report(StoreReportRequest  $request){


    $report = new Report;
    $report->title=$request->title;
    $report->description=$request->description;
     $report->user()->associate($request->user_id);



    $report->save();
}
}