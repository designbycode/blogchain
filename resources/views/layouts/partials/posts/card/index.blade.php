@props([
    'post' => null,
])

<div {{ $attributes->merge(['class' => 'rounded-lg bg-gray-800 overflow-hidden shadow-md hover:shadow-lg border-gray-900 transition-shadow duration-300 border
border-border']) }}>
    <a wire:navigate href="{{ route('posts.show', $post) }}">
        <img height="400" width="600" loading="lazy" src="{{ $post->getFirstMediaUrl('posts', 'card') }}"
             class=" object-cover block w-full aspect-3/2"
             alt="{{ $post->title }}" />
    </a>
    <div class="flex-1 p-6">
        <div class="flex justify-between items-center mb-2">
            <time class="text-sm text-gray-400 " datetime="{{ $post->create_at }}">
                {{ $post->created_at->format('M d, Y') }}
            </time>
            <a href="#">
                <span class="text-sm text-gray-400">
                    {{ $post->category->name }}
                </span>
            </a>
        </div>

        <a wire:navigate href="{{ route('posts.show', $post) }}" class="text-2xl hover:underline hover:decoration-primary-500 font-semibold mb-2 line-clamp-2
        text-white">
            {{ $post->title }}
        </a>
        <div class="text-gray-400 line-clamp-3 mb-4">{{ $post->excerpt }}</div>
    </div>
    <footer class="px-6 pb-6 flex flex-col space-y-4">
        <a href="#" class="flex items-center space-x-3 font-medium text-sm">
            <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}"
                 class="size-10 rounded-full object-cover border-2 border-gray-900" />
            <span>{{ $post->user->name }}</span>
        </a>
        <div class="flex justify-between">
            <livewire:component.like :model="$post" />
            <div class="flex space-x-3">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                    </svg>
                </button>
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Zm0-12.814a2.25 2.25 0 1 0 3.933-2.185 2.25 2.25 0 0 0-3.933 2.185Z" />
                    </svg>
                </button>
            </div>

        </div>

    </footer>
</div>
