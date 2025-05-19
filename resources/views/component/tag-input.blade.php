<div
    x-data
    @keydown.enter.prevent="$wire.addTag()"
    class="w-full"
>


    <x-mint::form-input
        type="text"
        wire:model.defer="tag"
        @keydown.enter.prevent="$wire.addTag()"
        placeholder="Add a tag and press Enter"
    />
    <div class="flex flex-wrap gap-2 mt-2">
        @foreach ($tags as $index => $tag)
            <div class="inline-flex items-center bg-primary-100 text-primary-800 px-2 py-1 rounded">
                {{ $tag }}
                <button
                    type="button"
                    class="ml-2 text-primary-400 hover:text-primary-700"
                    wire:click="removeTag({{ $index }})"
                >&times;
                </button>
            </div>
        @endforeach
    </div>

</div>
