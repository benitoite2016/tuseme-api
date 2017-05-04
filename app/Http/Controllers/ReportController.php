<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;
use App\Transformers\ReportTransformer;


class ReportController extends Controller
{


    public function index(Request $request){

        $reports = Report::all();

        return $reports;

        return fractal()
            ->item($announcement)
            ->transformWith(new AnnouncementTransformer)
            ->toArray();

    }

    /**
     * @param StoreReportRequest $request
     * @return array
     */
    public function report(StoreReportRequest  $request){


    $report = new Report;
    $report->title=$request->title;
    $report->description=$request->description;
     $report->user()->associate($request->user_id);



    $report->save();


        return fractal()
            ->item($report)
            ->transformWith(new ReportTransformer)
            ->toarray();

    }
    
    public function show(Report $report){
        return $report;

        return fractal()
            ->item($announcement)
            ->transformWith(new AnnouncementTransformer)
            ->toArray();
    }

public function update(UpdateReportRequest $request,Report $report ){


     $report->title=$request->get('title',$report->title);
    $report->description=$request->description;
    $report->save();
    return fractal()
        ->item($report)
        ->transformWith(new ReportTransformer)
        ->toarray();

}
  public function destroy(Report $report){
  
  }

}