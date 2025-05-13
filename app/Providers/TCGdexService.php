<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TCGDexService;

class TCGDexController extends Controller
{
    protected $tcgdex;

    public function __construct(TCGDexService $tcgdex)
    {
        $this->tcgdex = $tcgdex;
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $cards = $query ? $this->tcgdex->searchCards($query) : [];

        return view('users.dashboard', compact('query', 'cards'));
    }
}
