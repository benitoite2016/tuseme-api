<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnnouncementRequest;
use App\Models\Announcement;
use App\Transformers\AnnouncementTransformer;
use Illuminate\Http\Request;


class AnnouncementController extends Controller
{
    //

    public function index(Request $request){

        $announcements = Announcement::all();

        return $announcements;

        return fractal()
            ->item($announcement)
            ->transformWith(new AnnouncementTransformer)
            ->toArray();
    }

    public function store(StoreAnnouncementRequest $request){

        $announcement = new Announcement();

        $announcement->title = $request->title;
        $announcement->description = $request->description;
        $announcement->user()->associate($request->user_id);

        $announcement->save();

        return fractal()
            ->item($announcement)
            ->transformWith(new AnnouncementTransformer)
            ->toArray();

    }
}
