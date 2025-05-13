<?php

namespace App\Services;

use TCGdex\TCGdex;

class TCGDexService
{
    protected $client;

    public function __construct()
    {
        $this->client = new TCGdex();
    }

    // Method to get cards from a set by its code
    public function getCardsFromSet(string $setCode)
    {
        $set = $this->client->set->get($setCode);  // Get the set by its code
        return $set->cards;  // Return the list of cards from the set
    }
}
