<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{

    public function index()
    {
        $items = Item::all();
        return view('items', compact('items'));
    }

    public function store(Request $request)
    {
        $itemsData = $request->input('items', []);

        foreach ($itemsData as $itemData) {
            $validatedData = validator($itemData, [
                'name' => 'required|max:255',
                'width' => 'required|integer',
                'height' => 'required|integer',
                'position' => 'required|integer',
            ])->validate();

            Item::updateOrCreate(
                ['id' => $itemData['id']],
                $validatedData
            );
        }

        return response()->json(['success' => true]);
    }



    public function create()
    {
        return view('items.create');
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'width' => 'required|integer',
            'height' => 'required|integer',
            'position' => 'required|integer',
        ]);

        $item->update($data);

        return redirect()->route('items');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items');
    }
}
