<div class="wrapper my-12">
    <h1 class="text-3xl font-bold mb-6 text-center">🚀Trending Coins</h1>

    @if ($loading)
        <p class="text-center text-gray-500">Loading...</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($coins as $coin)
                <div class="bg-white dark:bg-gray-950 rounded-lg min-h-60 relative isolate overflow-clip">
                    <img src="{{ $coin['image'] }}" alt="{{ $coin['name'] }}"
                         class="size-80 absolute -right-12 -top-12 -z-10 blur-xs rounded-full mask-radial-[100%_100%] mask-radial-from-5%
                         mask-radial-at-top-right
                         opacity-25">
                    <div class="flex space-x-3 items-center p-6">
                        <img src="{{ $coin['image'] }}" alt="{{ $coin['name'] }}" class="size-14 bg-gray-700 p-1 rounded-full">
                        <div>
                            <p class="font-semibold text-lg">{{ $coin['name'] }} ({{ strtoupper($coin['symbol']) }})</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6 p-6 text-sm">
                        <div class="bg-gray-900/50 rounded-lg p-2 border border-gray-900 backdrop-blur-sm">
                            <small class="text-gray-500">Coin Name</small>
                            <p>{{ $coin['name'] }} </p>
                        </div>
                        <div class="bg-gray-900/50 rounded-lg p-2 border border-gray-900 backdrop-blur-sm">
                            <small class="text-gray-500">Coin Symbol</small>
                            <p>{{ strtoupper($coin['symbol']) }}</p>
                        </div>
                        <div class="bg-gray-900 rounded-lg p-2 border border-gray-900 backdrop-blur-sm">
                            <small class="text-gray-500">Market Cap</small>
                            <p>${{ number_format($coin['market_cap'] / 1e9, 2) }} B</p>
                            {{--                            <p>${{ number_format($coin['market_cap']) }} B</p>--}}
                        </div>
                        <div class="bg-gray-900/50 rounded-lg p-2 border border-gray-900 backdrop-blur-sm">
                            <small class="text-gray-500">Current Price</small>
                            <p>${{ number_format($coin['current_price'], 2) }}</p>
                        </div>
                        <div @class([
                                'bg-gray-900/50 rounded-lg p-2 border border-gray-900 backdrop-blur-sm col-span-2',
                                'text-green-500' => $coin['price_change_percentage_24h'] >= 0,
                                'text-red-500' => $coin['price_change_percentage_24h'] < 0,
                            ])>
                            <small class="text-gray-500">Price Change </small>
                            <p>{{ number_format($coin['price_change_percentage_24h'], 2) }}% (24h)</p>

                        </div>
                        <div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
