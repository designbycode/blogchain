<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Cryptocurrency',
                'description' => 'Digital or virtual currencies that use cryptography for security and operate independently of central banks.',
                'color' => '#f39c12',
            ],
            [
                'name' => 'NFTs',
                'description' => 'Non-fungible tokens representing ownership of unique digital items on the blockchain.',
                'color' => '#8e44ad',
            ],
            [
                'name' => 'Web3',
                'description' => 'The next generation of the internet focused on decentralization and blockchain technology.',
                'color' => '#2980b9',
            ],
            [
                'name' => 'Metaverse',
                'description' => 'A collective virtual space blending physical and digital realities for social interaction and commerce.',
                'color' => '#27ae60',
            ],
            [
                'name' => 'DeFi',
                'description' => 'Decentralized Finance applications offering financial services without traditional intermediaries.',
                'color' => '#c0392b',
            ],
            [
                'name' => 'Blockchain',
                'description' => 'A decentralized, distributed ledger technology that records transactions securely and transparently.',
                'color' => '#34495e',
            ],
            [
                'name' => 'AI',
                'description' => 'Artificial Intelligence technologies that enable machines to mimic human intelligence and behavior.',
                'color' => '#e67e22',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
