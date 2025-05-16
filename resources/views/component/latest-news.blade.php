<div class="mb-6">

    <h1 class="text-3xl font-bold text-white">
        Latest News
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-8 mt-8">
        @foreach($posts as $post)
            <div class="bg-gray-950 rounded-lg p-4 flex flex-col hover:scale-105 shadow-md hover:shadow-lg transition duration-300">
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

                <footer class="flex justify-end space-x-2">
                    <button class=" flex items-center space-x-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4 text-yellow-500">
                            <path
                                d="M1 8.74c0 .983.713 1.825 1.69 1.943.904.108 1.817.19 2.737.243.363.02.688.231.85.556l1.052 2.103a.75.75 0 0 0 1.342 0l1.052-2.103c.162-.325.487-.535.85-.556.92-.053 1.833-.134 2.738-.243.976-.118 1.689-.96 1.689-1.942V4.259c0-.982-.713-1.824-1.69-1.942a44.45 44.45 0 0 0-10.62 0C1.712 2.435 1 3.277 1 4.26v4.482Z" />
                        </svg>


                        <span class="text-sm ">{{ random_int(4, 100) }}</span>
                    </button>

                    <livewire:like :model="$post" />
                </footer>

            </div>
        @endforeach
    </div>

</div>
