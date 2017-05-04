<?php

namespace  App\Transformers;
use App\Models\Announcement;



class AnnouncementTransformer extends  \League\Fractal\TransformerAbstract
{

    public function transform(Announcement $announcement)
    {
        return[

            'title'=>$announcement->title,
            'description'=>$announcement->description,
        ];
    }
}