<?php

namespace App\Livewire;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;
use Livewire\Component;


class MemeCoins extends Component
{
    public array $coins = [];
    public bool $loading = true;

    public function mount(): void
    {
        $this->fetchTrendingCoins();
    }

    public function fetchTrendingCoins(): void
    {
        try {
            // Step 1: Get trending coin IDs
            $trending = Http::get('https://api.coingecko.com/api/v3/search/trending')->json();
            $ids = collect($trending['coins'])->pluck('item.id')->implode(',');

            // Step 2: Get market data for those IDs including additional fields
            $markets = Http::get("https://api.coingecko.com/api/v3/coins/markets", [
                'vs_currency' => 'usd',
                'ids' => $ids,
                'sparkline' => 'true', // Enable sparkline data
                'price_change_percentage' => '1h,24h,7d', // Include price change percentages
            ])->json();


            $this->coins = $markets;
        } catch (Exception $e) {
            logger()->error('Failed to fetch meme coins: ' . $e->getMessage());
            $this->coins = [];
        }

        $this->loading = false;
    }

    public function render(): View
    {
        return view('meme-coins');
    }
}
