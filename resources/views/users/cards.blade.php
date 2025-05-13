<x-layout>
    <h1 class="text-2xl font-bold mb-4">Cards from Set: {{ $setCode }}</h1>

    @if(isset($cards) && count($cards))
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($cards as $card)
                <div class="border p-4 rounded shadow">
                    <h2 class="font-semibold">{{ $card->name ?? 'Unknown' }}</h2>

                    <!-- Access set directly if it's a string -->
                    <p>Set: {{ $card->set->name ?? 'Unknown Set' }}</p>

                    <p><strong>Rarity:</strong> {{ $card->rarity ?? 'Unknown' }}</p>
                    <p><strong>HP:</strong> {{ $card->hp ?? 'N/A' }}</p>

                    <!-- Check if image exists before rendering it -->
                    @if(isset($card->images) && isset($card->images->small))
                        <img src="{{ $card->images->small }}" alt="{{ $card->name ?? 'Card Image' }}" class="w-full mt-2" />
                    @else
                        <p>No image available</p>
                    @endif
                </div>
            @endforeach
        </div>
        

    @else
        <p>No cards found in this set.</p>
    @endif
    

</x-layout>

