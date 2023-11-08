<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $today = Carbon::now(); // Gebruik Carbon om de huidige datum en tijd te krijgen
        $upcomingEvents = Event::whereDate('date', '>', Carbon::now())->orderBy('date')->get();

        return view('home', compact('upcomingEvents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
