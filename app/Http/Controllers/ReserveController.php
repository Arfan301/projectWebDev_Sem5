<?php

namespace App\Http\Controllers;

use App\Models\reserve; // Corrected to use the model
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function index()
    {
        return response()->json(reserve::all());
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'No_Telp' => 'required|string|max:15',
            'Reservation_Date' => 'required|date',
            'Number_Of_Guest' => 'required|integer|min:1|max:12',
            'user_id' => 'required|integer',
        ]);

        $reservation = reserve::create($validated);
        return response()->json($reservation, 201);
    }

    // Show a specific reservation
    public function show($id)
    {
        $reservation = reserve::findOrFail($id);
        return response()->json($reservation);
    }

    // Update a reservation
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'No_Telp' => 'required|string|max:15',
            'Reservation_Date' => 'required|date',
            'Number_Of_Guest' => 'required|integer|min:1|max:12',
            'user_id' => 'required|integer',
        ]);

        $reservation = reserve::findOrFail($id);
        $reservation->update($validated);
        return response()->json($reservation);
    }

    // Delete a reservation
    public function destroy($id)
    {
        $reservation = reserve::findOrFail($id);
        $reservation->delete();
        return response()->json(['message' => 'Reservation deleted successfully']);
    }
}
