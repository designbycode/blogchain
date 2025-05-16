<div x-data="{open: false}" class="text-shadow-xs text-shadow-black bg-gray-950/75 border border-gray-800/25 backdrop-blur-sm  rounded-lg p-6
space-y-4">
    <p class="text-lg font-semibold">Why was the NFT so arrogant?</p>
    <div x-show="!open">
        <button x-on:click="open = true">I don't know</button>
    </div>

    <p x-show="open" x-transition class="text-lg px-2 border-x-2 text-primary-400 rounded-lg inline-block border-white">Because it thought it was one of a
        kind.</p>
</div>
