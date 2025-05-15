@php use Illuminate\Support\Str; @endphp
<div>
    <div class="wrapper my-12 grid grid-cols-1 md:grid-cols-6 gap-4 md:gap-6 lg:gap-8">
        <div class="col-span-4 space-y-4 ">
            <div class="aspect-video ">
                <img src="{{ Vite::asset('resources/img/crypto.jpeg') }}" class="bg-gray-800 rounded-lg drop-shadow-spread drop-shadow-gray-900 border
                border-primary-500/75 aspect-video object-cover" alt="{{ $post->title }}" />
            </div>

            <h1 class="text-3xl font-bold text-white">
                {{ $post->title }}
            </h1>
            <div class="prose prose-invert w-full min-w-full ">
                {!! Str::markdown($post->content ) !!}
            </div>
        </div>
        <div class="col-span-2 relative">
            <div class="bg-gray-950/75 border-border-gray-950 min-h-40 rounded-lg sticky top-12 z-0"></div>
        </div>

    </div>

</div>
