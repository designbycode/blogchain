<div class="wrapper my-12 space-y-6">

    <div class="w-full flex justify-between  items-center mb-4 mt-1 ">
        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-100">Created posts</h3>
            <p class="text-gray-500">Overview of the listed post by {{ auth()->user()->name }}</p>
        </div>
        <div class="ml-4">
            <div class="w-full max-w-sm flex space-x-2 relative">
                <div class="relative">
                    <input
                        class="bg-white w-full pr-11 h-10 pl-3 py-2  placeholder:text-gray-400 text-gray-700 text-sm border border-gray-700/25 rounded
                        transition
                         duration-200 ease focus:outline-none focus:border-gray-400 hover:border-gray-400 shadow-sm focus:shadow-md"
                        placeholder="Search for invoice..."
                    />
                    <button
                        class="absolute h-8 w-8 right-1 top-1 my-auto px-2 flex items-center bg-white rounded "
                        type="button"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                             class="w-8 h-8 text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>
                <a class="px-4 py-2 bg-primary-500 hover:bg-primary-400 text-white rounded-lg" href="{{ route('dashboard.posts.create') }}">Create Post</a>
            </div>
        </div>

    </div>

    <div class="relative flex flex-col w-full h-full text-gray-300 bg-gray-800 shadow-md rounded-lg ">
        <table class="w-full text-left table-auto min-w-max rounded-lg">
            <thead>
            <tr>

                <th class="p-4 border-b border-gray-700/25 bg-gray-900/50">
                    <p class="text-sm font-normal leading-none text-gray-500">
                        Title
                    </p>
                </th>
                <th class="p-4 border-b border-gray-700/25 bg-gray-900/50">
                    <p class="text-sm font-normal leading-none text-gray-500">
                        Category
                    </p>
                </th>
                <th class="p-4 border-b border-gray-700/25 bg-gray-900/50">
                    <p class="text-sm font-normal leading-none text-gray-500">
                        Published At
                    </p>
                </th>
                <th class="p-4 border-b border-gray-700/25 bg-gray-900/50">
                    <p class="text-sm font-normal leading-none text-gray-500">
                        Created At
                    </p>
                </th>
                <th style="width: 100px;" class="p-4 border-b border-gray-700/25 bg-gray-900/50 ">
                    <p class="text-sm font-normal leading-none text-gray-500">
                        Actions
                    </p>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr class="hover:bg-gray-900/50 border-b border-gray-700/25" wire:key="{{ $post->id }}">

                    <td class="p-4 py-5">
                        <p class="text-sm text-gray-500">{{ $post->title }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <span class="text-xs text-gray-500 px-2 py-0.5 rounded-full border"
                              style="color: {{ $post->category->color }}; border-color: {{ $post->category->color }}">{{
                        $post->category->name
                        }}</span>
                    </td>
                    <td class="p-4 py-5">
                        <p class="text-sm text-gray-500">{{ $post->published_at ? 'publish' : 'unpublished' }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                    </td>
                    <td class="p-4 py-5 space-x-2 flex">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4 text-red-500">
                                <path fill-rule="evenodd"
                                      d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z"
                                      clip-rule="evenodd" />
                            </svg>
                        </button>
                        <a wire:navigate href="{{ route('dashboard.posts.edit', $post) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                                <path
                                    d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                                <path
                                    d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                            </svg>
                        </a>

                        <a wire:navigate href="{{ route('posts.show', $post) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                                <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                <path fill-rule="evenodd"
                                      d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                      clip-rule="evenodd" />
                            </svg>

                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="px-4 py-3">
            {{ $posts->links() }}
        </div>
    </div>


</div>
