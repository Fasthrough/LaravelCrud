<?php

namespace App\Http\Controllers;

use App\Services\TCGDexService;
use Illuminate\Http\Request;

class TCGDexController extends Controller
{
    protected $tcgdex;

    public function __construct(TCGDexService $tcgdex)
    {
        $this->tcgdex = $tcgdex;
    }

    // This method will fetch cards from a single set and display them
    public function showCardsFromSet($setCode = 'swsh3')  // Default set is 'swsh3'
    {
        // Fetch cards from the provided set code (default 'swsh3' if none is provided)
        $cards = $this->tcgdex->getCardsFromSet($setCode);

        // Return the view for displaying cards, passing the cards and setCode
        return view('users.cards', [
            'cards' => $cards,
            'setCode' => $setCode
        ]);
    }
  
}


