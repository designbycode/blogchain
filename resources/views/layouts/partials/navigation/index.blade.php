<nav class="bg-white dark:bg-gray-950/75 relative z-20" x-data="{ open: false }">
    <div class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4 sm:px-6 lg:px-8">
        <a wire:navigate class="text-xl font-bold flex space-x-1 items-center group" href="{{ route('home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                 class="size-6 group-hover:stroke-primary-500 group-hover:animate-pulse transition-all">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="m21 7.5-2.25-1.313M21 7.5v2.25m0-2.25-2.25 1.313M3 7.5l2.25-1.313M3 7.5l2.25 1.313M3 7.5v2.25m9 3 2.25-1.313M12 12.75l-2.25-1.313M12 12.75V15m0 6.75 2.25-1.313M12 21.75V19.5m0 2.25-2.25-1.313m0-16.875L12 2.25l2.25 1.313M21 14.25v2.25l-2.25 1.313m-13.5 0L3 16.5v-2.25" />
            </svg>
            <span class="dark:text-white">
                {{ config('app.name') }}
            </span>
        </a>

        <div class="flex flex-1 items-center justify-end md:justify-between">
            <nav aria-label="Global" class="hidden md:block">
                <ul class="flex items-center gap-6 text-sm">
                    <li>
                        <a wire:navigate
                           class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
                           href="{{ route('home') }}"
                        >
                            Home
                        </a>
                    </li>
                    <li>
                        <a wire:navigate
                           class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
                           href="{{ route('posts.index') }}"
                        >
                            Blog
                        </a>
                    </li>
                    <li>
                        <a wire:navigate
                           class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
                           href="{{ route('trending-coins') }}"
                        >
                            Trending Coins
                        </a>
                    </li>
                </ul>
            </nav>

            <div class="flex items-center gap-4">
                <div class="sm:flex sm:gap-4 items-center">
                    @guest
                        <a wire:navigate
                           class="block rounded-md bg-primary-600 px-4 py-1.5 text-sm font-medium text-white transition hover:bg-primary-700
                       dark:hover:bg-primary-500"
                           href="{{ route('login') }}"
                        >
                            Login
                        </a>

                        <a wire:navigate
                           class="hidden rounded-md bg-gray-100 px-4 py-1.5 text-sm font-medium text-primary-600 transition hover:text-primary-600/75 sm:block
                       dark:bg-gray-800 dark:text-white dark:hover:text-white/75"
                           href="{{ route('register') }}"
                        >
                            Register
                        </a>
                    @else
                        <a
                            class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75"
                            href="{{ route('dashboard.index') }}">
                            Dashboard
                        </a>
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-hidden focus:border-gray-300 transition">
                                        <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                             alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                    <button type="button"
                                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-hidden focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Account') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-dropdown-link>
                                @endif

                                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}"
                                                     @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @endguest
                </div>

                <button x-on:click="open = !open"
                        class="block rounded-sm bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-600/75 md:hidden dark:bg-gray-800 dark:text-white dark:hover:text-white/75"
                >
                    <span class="sr-only">Toggle menu</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
