<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{

    public function index()
    {
        $items = [
            ['id' => 'item1', 'name' => 'Αντικείμενο 1'],
            ['id' => 'item2', 'name' => 'Αντικείμενο 2'],
            ['id' => 'item3', 'name' => 'Αντικείμενο 3'],
            ['id' => 'item4', 'name' => 'Αντικείμενο 4'],
        ];

        return view('items', compact('items'));
    }

    public function store(Request $request)
    {
        // Παίρνουμε τα δεδομένα από το αίτημα
        $data = $request->all();

        // Μετατροπή των δεδομένων σε JSON
        $jsonData = json_encode($data);

        // Αποθήκευση των δεδομένων σε ένα αρχείο
        Storage::disk('local')->put('items_data.json', $jsonData);

        return response()->json(['success' => true]);
    }
}
