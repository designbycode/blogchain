<div>
    <div class="wrapper my-12">
        <h1 class="text-3xl font-bold text-white">
            Latest News
        </h1>
        <p class="text-gray-500 text-lg">Get the latest news about everything crypto </p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-8 mt-8">
            @foreach($posts as $post)
                <div class="bg-gray-950 rounded-lg p-4 flex flex-col shadow-md hover:shadow-lg transition duration-300">
                    <img class="aspect-video rounded-lg drop-shadow-spread drop-shadow-gray-900 -translate-y-8 border border-primary-500/75"
                         src="https://picsum.photos/id/{{$post->id}}/400/260"
                         alt="{{ $post->title }}">
                    <div class="flex-1">
                        <a href="#" class="font-semibold -mt-5 line-clamp-2">
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

                        <button class=" flex items-center space-x-0.5">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5 text-red-500">
                                <path
                                    d="m9.653 16.915-.005-.003-.019-.01a20.759 20.759 0 0 1-1.162-.682 22.045 22.045 0 0 1-2.582-1.9C4.045 12.733 2 10.352 2 7.5a4.5 4.5 0 0 1 8-2.828A4.5 4.5 0 0 1 18 7.5c0 2.852-2.044 5.233-3.885 6.82a22.049 22.049 0 0 1-3.744 2.582l-.019.01-.005.003h-.002a.739.739 0 0 1-.69.001l-.002-.001Z" />
                            </svg>
                            <span class="text-sm">{{ random_int(4, 100) }}</span>
                        </button>

                    </footer>

                </div>
            @endforeach
        </div>
        <div class="my-6">
            {{ $posts }}
        </div>

    </div>
</div>
