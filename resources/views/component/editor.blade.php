<div class="relative isolate">
    <div wire:ignore x-data="editor(@js($content))" class="bg-gray-700 border border-gray-500 rounded-md p-1">
        <div x-text="updatedAt"></div>
        <template x-if="isLoaded()">
            <div class="menu flex justify-between gap-2 mb-2 p-2 bg-gradient-to-b from-gray-900/15 shadow-md bg-gray-800 rounded-md sticky z-10 top-1">
                <div class="flex space-x-1">
                    @for($h = 1; $h <= 6; $h++)
                        <button type="button"
                                class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                                @click="toggleHeading({ level: {{$h}} })"
                                :class="{ 'bg-primary-500': isActive('heading', { level: {{$h}} }) && updatedAt }"
                        >
                            <strong>
                                H{{$h}}
                            </strong>

                            <span class="sr-only">Heading {{$h}}</span>
                        </button>
                    @endfor

                    {{-- Paragraph --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleParagraph()"
                            :class="{ 'bg-primary-500': isActive('paragraph') && updatedAt }"
                    >
                        <svg aria-hidden="true" class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="4" y="6" width="16" height="12" rx="2" />
                        </svg>
                        <span class="sr-only">Paragraph</span>
                    </button>

                    {{-- Bold --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleBold()"
                            :class="{ 'bg-primary-500': isActive('bold') && updatedAt }"
                    >
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M7 5h6a3 3 0 0 1 0 6H7zm0 6h7a3 3 0 1 1 0 6H7z" />
                        </svg>
                        <span class="sr-only">Bold</span>
                    </button>

                    {{-- Italic --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleItalic()"
                            :class="{ 'bg-primary-500': isActive('italic') && updatedAt }"
                    >
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <line x1="19" y1="4" x2="10" y2="4" />
                            <line x1="14" y1="20" x2="5" y2="20" />
                            <line x1="15" y1="4" x2="9" y2="20" />
                        </svg>
                        <span class="sr-only">Italic</span>
                    </button>

                    {{-- Strike --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleStrike()"
                            :class="{ 'bg-primary-500': isActive('strike') && updatedAt }"
                    >
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <line x1="4" y1="12" x2="20" y2="12" />
                            <path d="M7 9a5 5 0 0 1 10 0c0 2-2 3-4 3" />
                            <path d="M17 15a5 5 0 0 1-10 0" />
                        </svg>
                        <span class="sr-only">Strike</span>
                    </button>

                    {{-- Inline Code --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleCode()"
                            :class="{ 'bg-primary-500': isActive('code') && updatedAt }"
                    >
                        <svg aria-hidden="true" class="inline w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <polyline points="16 18 22 12 16 6" />
                            <polyline points="8 6 2 12 8 18" />
                        </svg>
                        <span class="sr-only">Inline code</span>
                    </button>

                    {{-- Blockquote --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleBlockquote()"
                            :class="{ 'bg-primary-500': isActive('blockquote') && updatedAt }"
                    >
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="7" width="18" height="10" rx="2" />
                            <polyline points="8,11 6,12 8,13" />
                            <polyline points="16,11 18,12 16,13" />
                            <line x1="11" y1="10" x2="13" y2="14" />
                        </svg>
                        <span class="sr-only">Blockquote</span>
                    </button>

                    {{-- Bullet List --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleBulletList()"
                            :class="{ 'bg-primary-500': isActive('bulletList') && updatedAt }"
                    >
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="6" cy="7" r="1.5" />
                            <circle cx="6" cy="12" r="1.5" />
                            <circle cx="6" cy="17" r="1.5" />
                            <line x1="10" y1="7" x2="20" y2="7" />
                            <line x1="10" y1="12" x2="20" y2="12" />
                            <line x1="10" y1="17" x2="20" y2="17" />
                        </svg>
                        <span class="sr-only">Bullet list</span>
                    </button>

                    {{-- Ordered List --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleOrderedList()"
                            :class="{ 'bg-primary-500': isActive('orderedList') && updatedAt }"
                    >
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <text x="4" y="8" font-size="2" font-family="monospace" fill="currentColor">1.</text>
                            <text x="4" y="13" font-size="2" font-family="monospace" fill="currentColor">2.</text>
                            <text x="4" y="18" font-size="2" font-family="monospace" fill="currentColor">3.</text>
                            <line x1="10" y1="7" x2="20" y2="7" />
                            <line x1="10" y1="12" x2="20" y2="12" />
                            <line x1="10" y1="17" x2="20" y2="17" />
                        </svg>
                        <span class="sr-only">Ordered list</span>
                    </button>

                    {{-- Code block --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleCodeBlock()"
                            :class="{ 'bg-primary-500': isActive('codeBlock') && updatedAt }"
                    >
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="6" width="18" height="12" rx="2" />
                            <polyline points="9,10 7,12 9,14" />
                            <polyline points="15,10 17,12 15,14" />
                        </svg>
                        <span class="sr-only">Code block</span>
                    </button>

                    {{-- Divider (Horizontal Rule) --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="setHorizontalRule()"
                    >
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <line x1="4" y1="12" x2="20" y2="12" />
                        </svg>
                        <span class="sr-only">Horizontal rule</span>
                    </button>

                    {{-- Hard break --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="setHardBreak()"
                    >
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <line x1="12" y1="4" x2="12" y2="20" />
                            <polyline points="8,16 12,20 16,16" />
                        </svg>
                        <span class="sr-only">Hard break</span>
                    </button>
                </div>
                <div class="flex space-x-1">

                    {{-- Undo --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="undo()"
                    >
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M9 14l-4-4 4-4" />
                            <path d="M5 10h7a4 4 0 1 1 0 8h-2" />
                        </svg>
                        <span class="sr-only">Undo</span>
                    </button>

                    {{-- Redo --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="redo()"
                    >
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M15 14l4-4-4-4" />
                            <path d="M19 10h-7a4 4 0 1 0 0 8h2" />
                        </svg>
                        <span class="sr-only">Redo</span>
                    </button>
                </div>

            </div>
        </template>
        <div class="w-full min-w-full prose md:prose-xl dark:prose-invert min-h-100 p-2" x-ref="element"></div>

    </div>
</div>
