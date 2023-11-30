<?php

namespace App\Http\Controllers;

use App\Models\ChartData;

class ChartController extends Controller
{

    public function index()
    {
        $chartData = ChartData::all()->map(function ($data) {
            return [
                'name' => $data->name,
                'data' => json_decode($data->value)
            ];
        });

        return response()->json($chartData);
    }
}
