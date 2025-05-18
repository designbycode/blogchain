<div class="relative isolate">
    <div x-data="editor($wire.entangle('content'))" class="bg-gray-700 border border-gray-500 rounded-md p-1">
        <template x-if="isLoaded()">
            <div class="menu flex space-x-2 mb-2 p-2 bg-gradient-to-b from-gray-900/15 shadow-md bg-gray-800 rounded-md sticky z-10 top-1">
                @for($h = 1; $h <= 6; $h++)
                    <button
                            type="button"
                            class="bg-gray-600 rounded-sm text-xs font-semibold text-gray-100 px-2 py-1.5"
                            @click="toggleHeading({ level: {{$h}} })"
                            :class="{ 'bg-primary-500': isActive('heading', { level: {{$h}} }, updatedAt) }"
                    >
                        H{{ $h }}
                    </button>
                @endfor

                <button
                        type="button"
                        class="bg-gray-600 rounded-sm text-xs font-semibold text-gray-100 px-2 py-1.5"
                        @click="toggleBold()" :class="{ 'bg-primary-500' : isActive('bold', updatedAt) }">
                    Bold
                </button>
                <button
                        type="button"
                        class="bg-gray-600 rounded-sm text-xs font-semibold text-gray-100 px-2 py-1.5"
                        @click="toggleItalic()" :class="{ 'bg-primary-500' : isActive('italic', updatedAt) }">
                    Italic
                </button>
            </div>
        </template>
        <div class="w-full min-w-full prose dark:prose-invert min-h-100 p-2" x-ref="element"></div>
    </div>

</div>
