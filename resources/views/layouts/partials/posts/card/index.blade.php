@props([
    'post' => null,
])

<div {{ $attributes->merge(['class' => 'bg-gray-950 rounded-lg p-4 flex flex-col hover:scale-105 shadow-md hover:shadow-lg transition duration-300']) }}>
    <a wire:navigate href="{{ route('posts.show', $post) }}">
        <img class="aspect-video bg-gray-800 rounded-lg drop-shadow-spread drop-shadow-gray-900 -translate-y-8 border border-primary-500/75"
             src="https://picsum.photos/id/{{$post->id}}/400/260"
             alt="{{ $post->title }}">
    </a>
    <div class="flex-1">
        <a wire:navigate href="{{ route('posts.show', $post) }}" class="font-semibold -mt-5 line-clamp-2">
            {{ $post->title }}
        </a>
    </div>
    <footer class="flex justify-between  items-center space-x-2 border-t border-gray-800 pt-4 my-2">
        <a href="#" class="flex items-center space-x-2">
            <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}"
                 class="size-10 rounded-full object-cover border-2 border-gray-900" />
            <span>{{ $post->user->name }}</span>
        </a>
        <livewire:like :model="$post" />
    </footer>
</div>
