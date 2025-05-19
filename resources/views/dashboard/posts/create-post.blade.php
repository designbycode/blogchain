<div class="wrapper my-12 space-y-4">
    <div>
        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Create a new posts</h3>
    </div>

    <x-mint::form class="bg-gray-800 rounded-lg p-6 shadow-md" wire:submit.prevent="createPost" method="post">

        <x-mint::form-section>
            <x-mint::form-label class="text-white" for="image">Image</x-mint::form-label>
            @if(($image && method_exists($image, 'temporaryUrl')))
                <img
                    src="{{ $image->temporaryUrl() }}"
                    class="w-1/2 mx-auto mb-4 aspect-video rounded-md"
                    alt=""
                >
            @endif
            <input class="bg-white p-4 rounded-md" type="file" accept="image/png,image/jpg" id="image" name="image" wire:model="image" />
            <x-mint::form-error for="image" />
        </x-mint::form-section>

        <x-mint::form-section>
            <x-mint::form-label class="text-white" for="title">Title</x-mint::form-label>
            <x-mint::form-input id="title" name="title" wire:model="title"></x-mint::form-input>
            <x-mint::form-error for="title" />
        </x-mint::form-section>

        <x-mint::form-section>
            <x-mint::form-label class="text-white" for="category">Category</x-mint::form-label>
            <select name="category" id="category" wire:model="category"
                    class="block w-full rounded-md border-mute-300  dark:placeholder:text-mute-300 dark:border-mute-500 text-mute-700 shadow-sm
                    focus:border-mute-600 focus:ring-primary-400/50 focus:ring-2 ring-offset-0 sm:text-sm dark:bg-mute-700 dark:text-mute-100">
                <option value="">Select a category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <x-mint::form-error for="category" />
        </x-mint::form-section>

        <x-mint::form-section>
            <x-mint::form-label class="text-white" for="category">Tags</x-mint::form-label>
            <livewire:component.tag-input :tags="$tags" />
        </x-mint::form-section>


        <x-mint::form-section>
            <x-mint::form-label class="text-white" for="excerpt">Excerpt</x-mint::form-label>
            <x-mint::form-textarea id="excerpt" rows="3" name="excerpt" wire:model="excerpt"></x-mint::form-textarea>
            <x-mint::form-error for="excerpt" />
        </x-mint::form-section>


        <x-mint::form-section>
            <x-mint::form-label class="text-white" for="content">Content</x-mint::form-label>
            <livewire:component.editor :content="$content" />
            <x-mint::form-error for="content" />
        </x-mint::form-section>


        <x-mint::form-section>
            <div class="flex items-center space-x-3">
                <x-mint::form-label for="live" class="text-white mb-0">Set Post Live</x-mint::form-label>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="live" wire:model="live" class="sr-only peer">
                    <span class="w-11 h-6 bg-gray-400 rounded-full peer-checked:bg-primary-500 transition-colors duration-300"></span>
                    <span class="absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform duration-300 peer-checked:translate-x-5"></span>
                </label>
            </div>
            <x-mint::form-error for="live" />
        </x-mint::form-section>

        <x-mint::form-section class="mt-4">
            <x-mint::button type="submit" wire:loading.attr="loading" variant="solid">Create Post</x-mint::button>
        </x-mint::form-section>
    </x-mint::form>
</div>
