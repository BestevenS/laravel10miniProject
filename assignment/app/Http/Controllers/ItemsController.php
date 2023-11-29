<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{

    public function index()
    {
        $filePath = storage_path('app/items_data.json');

        if (file_exists($filePath)) {
            $jsonData = file_get_contents($filePath);
            $data = json_decode($jsonData, true);
            $items = $data['items'] ?? [];
        } else {
            $items = [
                ['id' => 'item1', 'name' => 'Item 1'],
                ['id' => 'item2', 'name' => 'Item 2'],
                ['id' => 'item3', 'name' => 'Item 3'],
                ['id' => 'item4', 'name' => 'Item 4'],
            ];
        }

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
