<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnouncementRequest;
use Illuminate\Http\Request;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    //
    public function announcement(StoreAnnouncementRequest $request)
    {


        $announcement = new Announcement;
        $announcement->title = $request->title;
        $announcement->description = $request->description;
        $announcement->user()->associate($request->user_id);
        $announcement->date_created = $request->date_created;



        $announcement->save();

    }
}