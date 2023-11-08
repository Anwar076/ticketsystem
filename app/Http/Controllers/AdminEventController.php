<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class AdminEventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required',
            'description' => 'nullable',
        ]);

        Event::create($request->all());

        return redirect()->route('admin.events.index');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required',
            'description' => 'nullable',
        ]);

        $event->update($request->all());

        return redirect()->route('admin.events.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index');
    }
}
