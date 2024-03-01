<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Tag;

class ApiEventController extends Controller
{
    public function getEvents(){
        // $events = Event :: all();
        // $tags = Tag :: all();

        $events = Event::with('user', 'tags')->get();

        return response()->json([
            'events' => $events,
            // 'tags' => $tags,
        ]);
    }
}
