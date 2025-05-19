@php use Illuminate\Support\Str; @endphp
<div>
    <div class="wrapper my-12 grid grid-cols-1 md:grid-cols-6 gap-4 md:gap-6 lg:gap-8">
        <div class="col-span-4 space-y-6 ">
            <div class="aspect-video ">

                <img src="{{ $post->getFirstMediaUrl('posts', 'main') }}" class="bg-gray-800 rounded-lg drop-shadow-spread drop-shadow-gray-900 border
                border-primary-500/75 aspect-video object-cover" alt="{{ $post->title }}" />

            </div>

            <h1 class="text-5xl font-bold dark:text-white">
                {{ $post->title }}
            </h1>
            <div class="flex space-x-2 ny-2">
                <strong>Tags:</strong>
                @foreach($post->tags as $tag)
                    <a href="#" class="text-xs px-2 py-1 rounded-full border border-gray-600 text-gray-600 hover:bg-gray-400/5">{{ $tag->name }}</a>
                @endforeach
            </div>

            <div class="text-lg"><strong>In category</strong>: {{ $post->category->name }}</div>
            <div class="flex bg-gray-800/25 rounded-lg p-2">
                <div class="flex items-center">
                    <img src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}"
                         class="size-8 rounded-full object-cover border-2 border-gray-900" />
                    <a href="#"
                       class="text-gray-200 hover:text-gray-300 font-semibold ml-2">{{ $post->user->name }}</a>
                </div>
            </div>
            <div class="w-full min-w-full prose md:prose-xl dark:prose-invert ">
                {!! Str::markdown($post->content ) !!}
            </div>
        </div>
        <div class="col-span-2 relative">
            <div class=" sticky top-12 z-0 bg-gray-800 rounded-md border border-gray-900 min-h-60">

            </div>
        </div>

    </div>

</div>
