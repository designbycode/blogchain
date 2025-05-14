<div>
    <h1 class="text-3xl font-bold mb-6 text-center">🚀 Trending Meme Coins</h1>

    @if ($loading)
        <p class="text-center text-gray-500">Loading...</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($coins as $coin)
                <div class="bg-gray-950 shadow-md rounded-xl p-4 mb-4 flex items-center justify-between hover:scale-[1.01] transition-transform">
                    <div class="flex items-center gap-4">
                        <img src="{{ $coin['image'] }}" alt="{{ $coin['name'] }}" class="w-10 h-10 rounded-full">
                        <div>
                            <p class="font-semibold text-lg">{{ $coin['name'] }} ({{ strtoupper($coin['symbol']) }})</p>
                            <p class="text-sm text-gray-500">Market Cap: ${{ number_format($coin['market_cap'] / 1e9, 2) }}B</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-xl font-bold">${{ number_format($coin['current_price'], 2) }}</p>
                        <p class="text-sm {{ $coin['price_change_percentage_24h'] >= 0 ? 'text-green-500' : 'text-red-500' }}">
                            {{ number_format($coin['price_change_percentage_24h'], 2) }}% (24h)
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
