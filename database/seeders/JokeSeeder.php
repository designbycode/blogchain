<?php

namespace Database\Seeders;

use App\Models\Joke;
use Illuminate\Database\Seeder;

class JokeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jokes = [
            [
                'question' => 'Why don’t crypto investors need a GPS?',
                'answer' => 'Because they always follow the charts.',
            ],
            [
                'question' => 'Why did the blockchain break up with fiat?',
                'answer' => "It couldn't handle all the drama and manipulation."
            ],
            [
                'question' => 'How many crypto traders does it take to change a light bulb?',
                'answer' => 'None. They just HODL in the dark.'
            ],
            [
                'question' => 'Why did the altcoin go to therapy?',
                'answer' => 'It had an identity crisis every week.'
            ],
            [
                'question' => 'What’s a crypto bro’s favorite type of music?',
                'answer' => 'Proof-of-Work'
            ],
            [
                'question' => 'I invested in a new coin called “Titanic.”',
                'answer' => 'It sank within hours.'
            ],
            [
                'question' => 'Why are NFTs bad at relationships?',
                'answer' => 'They’re non-fungible and can’t commit.'
            ],
            [
                'question' => 'Why did Satoshi stop going to parties?',
                'answer' => 'Too many forks in the conversation.'
            ],
            [
                'question' => "What's a Bitcoin maximalist’s favorite exercise?",
                'answer' => 'Pump and HODL.'
            ],
            [
                'question' => 'Why did the crypto trader bring a ladder to the market?',
                'answer' => 'To reach new highs.'
            ],
            [
                'question' => 'What do you call it when Bitcoin goes to therapy?',
                'answer' => 'A psychological correction.'
            ],
            [
                'question' => 'Why did the whale get banned from poker night?',
                'answer' => 'Because he kept pumping the pot and dumping the chips.'
            ],
            [
                'question' => 'What did the Ethereum developer say to the magician?',
                'answer' => '"Nice trick, but mine is trustless."'
            ],
            [
                'question' => 'How do you know someone bought Bitcoin at $60k?',
                'answer' => 'Don’t worry, they’ll tell you.'
            ],
            [
                'question' => 'Why are crypto wallets like onions?',
                'answer' => 'Because they make you cry when you open them.'
            ],
            [
                'question' => 'Why was the DeFi farmer always broke?',
                'answer' => 'He kept getting rugged.'
            ],
            [
                'question' => 'What’s the difference between a crypto trader and a gambler?',
                'answer' => 'About three bad trades.'
            ],
            [
                'question' => 'Why did the Bitcoin investor cross the road?',
                'answer' => 'To escape the bear market.'
            ],
            [
                'question' => 'How do you throw a crypto party?',
                'answer' => 'You airdrop the invites.'
            ],
            [
                'question' => 'What’s a blockchain developer’s favorite drink?',
                'answer' => 'Smart contracts-on-the-rocks.'
            ],
            [
                'question' => 'Why don’t crypto bros use doorbells?',
                'answer' => 'They prefer to signal.'
            ],
            [
                'question' => 'What do you call someone who lost their private keys?',
                'answer' => 'A former millionaire.'
            ],
            [
                'question' => 'Why did the meme coin apply for a job?',
                'answer' => 'It ran out of hype.'
            ],
            [
                'question' => 'What’s the scariest word to a crypto trader?',
                'answer' => '"Regulation."'
            ],
            [
                'question' => 'Why did the DAO start a band?',
                'answer' => 'It wanted decentralized beats.'
            ],
            [
                'question' => 'What’s the best pick-up line in crypto?',
                'answer' => '“Are you a Layer 2? Because you make everything faster.”'
            ],
            [
                'question' => 'Why was the NFT so arrogant?',
                'answer' => 'Because it thought it was one of a kind.'
            ],
            [
                'question' => 'Why do Bitcoin miners make bad roommates?',
                'answer' => 'They hog all the power.'
            ],
            [
                'question' => 'Why did the smart contract get a divorce?',
                'answer' => 'It was too rigid—no room for compromise.'
            ]
        ];

        foreach ($jokes as $joke) {
            Joke::create($joke);
        }

    }
}
