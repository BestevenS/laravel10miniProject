<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        // Στατικά δεδομένα για το γράφημα
        $chartData = [
            ['name' => 'Προϊόν 1', 'data' => [1, 3, 4, 7, 2]],
            ['name' => 'Προϊόν 2', 'data' => [5, 7, 6, 2, 8]],
            // Μπορείτε να προσθέσετε περισσότερες σειρές δεδομένων εδώ
        ];

        // Επιστρέφουμε τα δεδομένα σε μορφή JSON
        return response()->json($chartData);
    }
}
