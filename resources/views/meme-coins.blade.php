<div class="wrapper my-12">
    <h1 class="text-3xl font-bold mb-6 text-center">🚀 Trending Meme Coins</h1>

    @if ($loading)
        <p class="text-center text-gray-500">Loading...</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($coins as $coin)
                <div class="bg-white dark:bg-gray-950 rounded-lg min-h-60">
                    <div class="flex space-x-3 items-center p-6">
                        <img src="{{ $coin['image'] }}" alt="{{ $coin['name'] }}" class="size-14 bg-white p-2 rounded-full">
                        <div>
                            <p class="font-semibold text-lg">{{ $coin['name'] }} ({{ strtoupper($coin['symbol']) }})</p>
                            <p class="text-sm text-gray-500">Market Cap: ${{ number_format($coin['market_cap'] / 1e9, 2) }}B</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6 p-6 text-sm">
                        <div class="bg-gray-900 rounded-lg p-2 ">
                            {{ $coin['name'] }} ({{ strtoupper($coin['symbol']) }})
                        </div>
                        <div class="bg-gray-900 rounded-lg p-2 ">
                            ${{ number_format($coin['market_cap'] / 1e9, 2) }}B
                        </div>
                        <div class="bg-gray-900 rounded-lg p-2 ">
                            ${{ number_format($coin['current_price'], 2) }}
                        </div>
                        <div @class([
                                'bg-gray-900 rounded-lg p-2 ',
                                'text-green-500' => $coin['price_change_percentage_24h'] >= 0,
                                'text-red-500' => $coin['price_change_percentage_24h'] < 0,
                            ])>
                            {{ number_format($coin['price_change_percentage_24h'], 2) }}% (24h)
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
