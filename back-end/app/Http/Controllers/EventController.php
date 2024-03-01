<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Tag;
use App\Models\User;

use App\Http\Requests\EventStoreRequest;

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
        $tags = Tag :: all();
        $users = User :: all();

        return view('events.create', compact('tags', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
        $data = $request -> all();

        $user = User :: find($data['user_id']);

        $newEvent = new Event();

        $newEvent -> name = $data['name'];
        $newEvent -> description = $data['description'];
        $newEvent -> date = $data['date'];
        $newEvent -> location = $data['location'];

        $newEvent -> user() -> associate($user);

        $newEvent -> save();

        if (isset($data['tags'])) {

            $newEvent -> tags() -> attach($data['tags']);

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
        $event = Event::with('tags', 'user') -> find($id);

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

        $users = User :: all();

        return view('events.edit', compact('event', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventStoreRequest $request, $id)
    {
        $event = Event ::with('tags') -> find($id);

        $data = $request -> all();

        $user = User :: find($data['user_id']);

        $event -> name = $data['name'];
        $event -> description = $data['description'];
        $event -> date = $data['date'];
        $event -> location = $data['location'];

        $event -> user() -> associate($user);

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
