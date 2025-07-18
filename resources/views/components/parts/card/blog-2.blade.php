@props([
    'post',
    'loop' => null,
    'featurded' => false,
])
@php
    //    dd($post);
@endphp

@if($post)
    <x-parts.card
        no-padding
        @class([
        'rounded-lg hover:shadow-lg h-full flex flex-col group',
        'col-span-full md:col-span-1 md:row-span-1' => (boolean) !$loop->first,
        'col-span-full md:col-span-2 md:row-span-2' => (boolean) $loop->first
        ])
    >
        <div class="relative ">
            <div class="flex p-2 gap-2">

                @if($post->hasMedia('posts'))
                    <div class="aspect-video flex-1">
                        <a wire:navigate.hover href="{{ route('posts.show', [$post->category, $post]) }}">
                            <img
                                src="{{ $post->getFirstMediaUrl('posts', 'card') }}"
                                alt="Image for {{ $post->title }} blog post"
                                class="w-full rounded-lg aspect-video object-cover transition-transform duration-300 "
                            />
                        </a>
                    </div>
                @endif
                <div @class([
                    'rounded-lg bg-gray-50 dark:bg-gray-800/50 p-2 border border-gray-200 dark:border-gray-800',
                    'w-12 ' => $post->hasMedia('posts'),
                    'h-12 flex flex-1 items-center' => !$post->hasMedia('posts')

])>
                    {{--                        <x-parts.tooltip text="Bookmark" position="left">--}}
                    {{--                            <button class="aspect-square w-full hover:bg-gray-500/20 rounded-lg grid place-content-center text-gray-500">--}}
                    {{--                                <x-heroicon-s-bookmark-slash class="size-4"/>--}}
                    {{--                            </button>--}}
                    {{--                        </x-parts.tooltip>--}}
                    {{--                        <x-parts.tooltip text="Share" position="left">--}}
                    {{--                            <button class="aspect-square w-full hover:bg-gray-500/20 rounded-lg grid place-content-center text-gray-500">--}}
                    {{--                                <x-heroicon-s-share class="size-4 "/>--}}
                    {{--                            </button>--}}
                    {{--                        </x-parts.tooltip>--}}
                    <x-parts.tooltip text="{{ $post->visits->count() }} Page Views" position="left">
                        <button class="aspect-square size-8 hover:bg-gray-500/20 rounded-lg grid place-content-center text-gray-500">
                            <x-heroicon-s-eye class="size-4 "/>
                        </button>
                    </x-parts.tooltip>
                    <x-parts.tooltip :text="'Reading time ' . $post->estimatedReadTime . ' ' . Str::plural('minute', $post->estimatedReadTime)"
                                     position="left">
                        <button class="aspect-square size-8 hover:bg-gray-500/20 rounded-lg grid place-content-center text-gray-500">
                            <x-heroicon-o-clock class="size-4 "/>
                        </button>
                    </x-parts.tooltip>
                </div>
            </div>
        </div>
        <div class="p-6 flex-1 flex flex-col">
            <a wire:navigate.hover href="{{ route('posts.show', [$post->category, $post]) }}" class="group-link">
                <h3 class="font-bold text-gray-900 dark:text-white mb-3 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors text-lg
            2xl:text-xl line-clamp-2">
                    {{ $post->title }}
                </h3>
            </a>
            <p class="text-gray-600 dark:text-gray-300 mb-4 opacity-75 flex-1 2xl:text-base line-clamp-2 text-sm">
                {{ $post->description }}
            </p>
            <div class="flex items-center justify-between mb-0">
                <x-parts.tooltip text="Post author" position="top">
                    <div class="flex items-center space-x-2">
                        <img
                            src="{{ $post->user->avatar_url }}"
                            alt="{{ $post->user->name }}"
                            width="32"
                            height="32"
                            class="rounded-full"
                        />
                        <span class="text-gray-500 dark:text-gray-400 text-sm">
              {{ $post->user->name }}
            </span>
                    </div>
                </x-parts.tooltip>
                <div class="flex space-x-3 text-xs">
                    {{--                    <x-parts.tooltip text="Post unique views" position="top">--}}
                    {{--                        <div class="flex space-x-2 items-center">--}}
                    {{--                            <x-heroicon-s-eye class="size-5 text-gray-500"/>--}}
                    {{--                            <span>--}}
                    {{--                                 {{ $post->visits->count() }}--}}
                    {{--                            </span>--}}
                    {{--                        </div>--}}
                    {{--                    </x-parts.tooltip>--}}
                    <x-parts.tooltip text="Like post" position="top">
                        <livewire:parts.like :model="$post"/>
                    </x-parts.tooltip>
                </div>
            </div>
        </div>
    </x-parts.card>
@endif
