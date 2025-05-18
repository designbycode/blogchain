<div class="mb-6">
    <h1 class="text-3xl font-bold text-white">
        Latest News
    </h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-4 gap-y-8 mt-8">
        @foreach($posts as $post)
            <x-app::posts.card :$post />
        @endforeach
    </div>

</div>
