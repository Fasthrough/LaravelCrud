<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCGdex\TCGdex;

class DashboardController extends Controller
{
    public function index()
    {
        $tcgdex = new TCGdex();

        // Fetch a list of sets (example: from a specific series like 'swsh')
        $sets = $tcgdex->serie->get('swsh')->sets ?? [];

        return view('users.dashboard', compact('sets'));
    }
}
