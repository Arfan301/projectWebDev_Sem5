<?php

namespace App\Http\Controllers;

use App\Models\Menu; // Use the correct model
use Inertia\Inertia;

class FoodController extends Controller
{
    public function index()
    {
        // Fetch data from the 'menus' table using the Menu model
        $menus = Menu::select('id', 'name', 'price', 'description')->get();

        // Pass the data to the Vue component
        return Inertia::render('Dashboard', [
            'menus' => $menus
        ]);
    }
}
