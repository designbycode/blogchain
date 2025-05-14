<div class="bg-primary-950">
    <div
        x-data
        x-init="
            $nextTick(() => {
                const content = $refs.content;
                const item = $refs.item;
                const clone = item.cloneNode(true);
                content.appendChild(clone);
            });
        "
        class="relative w-full bg-primary-950 container-block group"
    >
        <div class="relative w-full py-1 mx-auto overflow-hidden">
            <div class="absolute left-0 z-20 w-40 h-full bg-gradient-to-r from-primary-950 to-transparent"></div>
            <div class="absolute right-0 z-20 w-40 h-full bg-gradient-to-l from-primary-950 to-transparent"></div>
            <div x-ref="content" class="flex animate-marquee">
                <div x-ref="item" class="flex items-center justify-around flex-shrink-0 w-full space-x-2 text-white">
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                    <a href="#">Link</a>
                </div>
            </div>
        </div>
    </div>
</div>
