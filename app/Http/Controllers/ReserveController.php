<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;

class ReserveController extends Controller
{
    public function addReservation(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'Name' => 'required|string|max:255',
            'No_Telp' => 'required|string|max:15',
            'Reservation_Date' => 'required|date',
            'Number_Of_Guest' => 'required|integer|min:1|max:12', // Batas maksimal 12 tamu
            'user_id' => 'required|exists:users,id',
        ]);

        // Menambahkan data ke database
        Reserve::create($validatedData);

        return response()->json(['message' => 'Reservation successfully added!'], 201);
    }
}
