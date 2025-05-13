<x-layout>
    <h1 class="text-2xl font-bold mb-4">Choose a Set to View Cards</h1>

    <div class="grid grid-cols-2 gap-4">
        <!-- Set Buttons (replace with actual set names or codes) -->
        <a href="{{ route('cards.set', ['setCode' => 'swsh3']) }}" class="bg-blue-600 text-white px-4 py-2 rounded">Sword & Shield: Series 3</a>
        <a href="{{ route('cards.set', ['setCode' => 'swsh4']) }}" class="bg-blue-600 text-white px-4 py-2 rounded">Sword & Shield: Series 4</a>
    </div>
</x-layout>
