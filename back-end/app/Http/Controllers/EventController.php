<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Tag;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event :: all();

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $event = Event :: all();
        $tags = Tag :: all();
        return view('events.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request -> all();

        $newEvent = new Event();

        $newEvent -> name = $data['name'];
        $newEvent -> description = $data['description'];
        $newEvent -> date = $data['date'];
        $newEvent -> location = $data['location'];

        $newEvent -> save();

        if (isset($data['tags'])) {
            $newEvent->tags()->attach($data['tags']);

        }
        return redirect() -> route('event.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::with('tags') -> find($id);

        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::with('tags') -> find($id);

        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event ::with('tags') -> find($id);

        $data = $request -> all();

        $event -> name = $data['name'];
        $event -> description = $data['description'];
        $event -> date = $data['date'];
        $event -> location = $data['location'];

        $event -> save();

        return redirect() -> route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event :: find($id);

        $event -> tags() -> detach();

        $event -> delete();

        return redirect() -> route('event.index');
    }
}
