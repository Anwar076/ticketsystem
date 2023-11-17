<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;

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
        // Valideer de ingediende gegevens
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Valideer het uploaden van een afbeelding
            'price' => 'nullable|numeric', // Valideer het prijsveld (optioneel)
        ]);

        // Verwerk de geüploade afbeelding
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Genereer een unieke bestandsnaam
            $image->storeAs('public/images', $imageName); // Sla de afbeelding op in de 'public/images' map
            $imageUrl = asset('storage/images/' . $imageName); // Genereer de URL voor de opgeslagen afbeelding
        }

        // Maak een nieuw evenement aan en sla het op in de database
        $event = new Event([
            'title' => $validatedData['title'],
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'location' => $validatedData['location'],
            'description' => $validatedData['description'] ?? '',
            'imageurl' => $imageUrl ?? '', // Sla de URL van de opgeslagen afbeelding op
            'price' => $validatedData['price'] ?? null, // Sla de prijs op als die is ingediend, anders null
        ]);
        $event->save();

        return redirect('/')->with('success', 'Evenement succesvol aangemaakt.');
    }


    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required',
            'description' => 'nullable',
            'price' => 'nullable|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validatie voor optionele nieuwe afbeelding
        ]);

        // Update de velden van het evenement met gevalideerde gegevens
        $event->fill($validatedData);

        // Verwerk de geüploade afbeelding indien aanwezig
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $imageUrl = asset('storage/images/' . $imageName);
            $event->imageurl = $imageUrl;
        }

        $event->save();

        return redirect()->route('admin.events.index')->with('success', 'Evenement succesvol bijgewerkt.');
    }



    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index');
    }
}
