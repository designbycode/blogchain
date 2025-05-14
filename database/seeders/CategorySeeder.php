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
                'description' => 'Digital or virtual currencies that use cryptography for security and operate independently of central banks.'
            ],
            [
                'name' => 'NFTs',
                'description' => 'Non-fungible tokens representing ownership of unique digital items on the blockchain.'
            ],
            [
                'name' => 'Web3',
                'description' => 'The next generation of the internet focused on decentralization and blockchain technology.'
            ],
            [
                'name' => 'Metaverse',
                'description' => 'A collective virtual space blending physical and digital realities for social interaction and commerce.'
            ],
            [
                'name' => 'DeFi',
                'description' => 'Decentralized Finance applications offering financial services without traditional intermediaries.'
            ],
            [
                'name' => 'Blockchain',
                'description' => 'A decentralized, distributed ledger technology that records transactions securely and transparently.'
            ],
            [
                'name' => 'AI',
                'description' => 'Artificial Intelligence technologies that enable machines to mimic human intelligence and behavior.'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
