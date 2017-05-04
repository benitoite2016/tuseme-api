<?php

namespace  App\Transformers;
use App\Models\Report;


class ReportTransformer extends  \League\Fractal\TransformerAbstract
{

    public function transform(Report $report)
    {
        return[

            'title'=>$report->title,
            'description'=>$report->description,
        ];
    }
}