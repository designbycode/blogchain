<div class="relative isolate">
    <div wire:ignore x-data="editor(@js($content))" class="bg-gray-700 border border-gray-500 rounded-md p-1">
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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd"
                                  d="M3 3a1 1 0 0 1 1-1h5a3.5 3.5 0 0 1 2.843 5.541A3.75 3.75 0 0 1 9.25 14H4a1 1 0 0 1-1-1V3Zm2.5 3.5v-2H9a1 1 0 0 1 0 2H5.5Zm0 2.5v2.5h3.75a1.25 1.25 0 1 0 0-2.5H5.5Z"
                                  clip-rule="evenodd" />
                        </svg>


                        <span class="sr-only">Bold</span>
                    </button>

                    {{-- Italic --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleItalic()"
                            :class="{ 'bg-primary-500': isActive('italic') && updatedAt }"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd"
                                  d="M6.25 2.75A.75.75 0 0 1 7 2h6a.75.75 0 0 1 0 1.5h-2.483l-3.429 9H9A.75.75 0 0 1 9 14H3a.75.75 0 0 1 0-1.5h2.483l3.429-9H7a.75.75 0 0 1-.75-.75Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span class="sr-only">Italic</span>
                    </button>

                    {{-- Strike --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleStrike()"
                            :class="{ 'bg-primary-500': isActive('strike') && updatedAt }"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd"
                                  d="M9.165 3.654c-.95-.255-1.921-.273-2.693-.042-.769.231-1.087.624-1.173.947-.087.323-.008.822.543 1.407.389.412.927.77 1.55 1.034H13a.75.75 0 0 1 0 1.5H3A.75.75 0 0 1 3 7h1.756l-.006-.006c-.787-.835-1.161-1.849-.9-2.823.26-.975 1.092-1.666 2.191-1.995 1.097-.33 2.36-.28 3.512.029.75.2 1.478.518 2.11.939a.75.75 0 0 1-.833 1.248 5.682 5.682 0 0 0-1.665-.738Zm2.074 6.365a.75.75 0 0 1 .91.543 2.44 2.44 0 0 1-.35 2.024c-.405.585-1.052 1.003-1.84 1.24-1.098.329-2.36.279-3.512-.03-1.152-.308-2.27-.897-3.056-1.73a.75.75 0 0 1 1.092-1.029c.552.586 1.403 1.056 2.352 1.31.95.255 1.92.273 2.692.042.55-.165.873-.417 1.038-.656a.942.942 0 0 0 .13-.803.75.75 0 0 1 .544-.91Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span class="sr-only">Strike</span>
                    </button>

                    {{-- Add Link --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="addLink()"
                            :title="'Add Link'"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd"
                                  d="M8.914 6.025a.75.75 0 0 1 1.06 0 3.5 3.5 0 0 1 0 4.95l-2 2a3.5 3.5 0 0 1-5.396-4.402.75.75 0 0 1 1.251.827 2 2 0 0 0 3.085 2.514l2-2a2 2 0 0 0 0-2.828.75.75 0 0 1 0-1.06Z"
                                  clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                  d="M7.086 9.975a.75.75 0 0 1-1.06 0 3.5 3.5 0 0 1 0-4.95l2-2a3.5 3.5 0 0 1 5.396 4.402.75.75 0 0 1-1.251-.827 2 2 0 0 0-3.085-2.514l-2 2a2 2 0 0 0 0 2.828.75.75 0 0 1 0 1.06Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span class="sr-only">Add Link</span>
                    </button>


                    {{-- Inline Code --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleCode()"
                            :class="{ 'bg-primary-500': isActive('code') && updatedAt }"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M14.25 9.75 16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                        </svg>


                        <span class="sr-only">Inline code</span>
                    </button>
                    {{-- Code block --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleCodeBlock()"
                            :class="{ 'bg-primary-500': isActive('codeBlock') && updatedAt }"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd"
                                  d="M4.78 4.97a.75.75 0 0 1 0 1.06L2.81 8l1.97 1.97a.75.75 0 1 1-1.06 1.06l-2.5-2.5a.75.75 0 0 1 0-1.06l2.5-2.5a.75.75 0 0 1 1.06 0ZM11.22 4.97a.75.75 0 0 0 0 1.06L13.19 8l-1.97 1.97a.75.75 0 1 0 1.06 1.06l2.5-2.5a.75.75 0 0 0 0-1.06l-2.5-2.5a.75.75 0 0 0-1.06 0ZM8.856 2.008a.75.75 0 0 1 .636.848l-1.5 10.5a.75.75 0 0 1-1.484-.212l1.5-10.5a.75.75 0 0 1 .848-.636Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span class="sr-only">Code block</span>
                    </button>

                    {{-- Blockquote --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleBlockquote()"
                            :class="{ 'bg-primary-500': isActive('blockquote') && updatedAt }"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                             stroke-linejoin="round">
                            <rect x="3" y="5" width="18" height="14" rx="2" />
                            <path d="M7 9h5M7 13h10" />
                        </svg>
                        <span class="sr-only">Blockquote</span>
                    </button>

                    {{-- Bullet List --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleBulletList()"
                            :class="{ 'bg-primary-500': isActive('bulletList') && updatedAt }"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path fill-rule="evenodd"
                                  d="M6 4.75A.75.75 0 0 1 6.75 4h10.5a.75.75 0 0 1 0 1.5H6.75A.75.75 0 0 1 6 4.75ZM6 10a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H6.75A.75.75 0 0 1 6 10Zm0 5.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H6.75a.75.75 0 0 1-.75-.75ZM1.99 4.75a1 1 0 0 1 1-1H3a1 1 0 0 1 1 1v.01a1 1 0 0 1-1 1h-.01a1 1 0 0 1-1-1v-.01ZM1.99 15.25a1 1 0 0 1 1-1H3a1 1 0 0 1 1 1v.01a1 1 0 0 1-1 1h-.01a1 1 0 0 1-1-1v-.01ZM1.99 10a1 1 0 0 1 1-1H3a1 1 0 0 1 1 1v.01a1 1 0 0 1-1 1h-.01a1 1 0 0 1-1-1V10Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span class="sr-only">Bullet list</span>
                    </button>

                    {{-- Ordered List --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="toggleOrderedList()"
                            :class="{ 'bg-primary-500': isActive('orderedList') && updatedAt }"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path
                                d="M3 1.25a.75.75 0 0 0 0 1.5h.25v2.5a.75.75 0 0 0 1.5 0V2A.75.75 0 0 0 4 1.25H3ZM2.97 8.654a3.5 3.5 0 0 1 1.524-.12.034.034 0 0 1-.012.012L2.415 9.579A.75.75 0 0 0 2 10.25v1c0 .414.336.75.75.75h2.5a.75.75 0 0 0 0-1.5H3.927l1.225-.613c.52-.26.848-.79.848-1.371 0-.647-.429-1.327-1.193-1.451a5.03 5.03 0 0 0-2.277.155.75.75 0 0 0 .44 1.434ZM7.75 3a.75.75 0 0 0 0 1.5h9.5a.75.75 0 0 0 0-1.5h-9.5ZM7.75 9.25a.75.75 0 0 0 0 1.5h9.5a.75.75 0 0 0 0-1.5h-9.5ZM7.75 15.5a.75.75 0 0 0 0 1.5h9.5a.75.75 0 0 0 0-1.5h-9.5ZM2.625 13.875a.75.75 0 0 0 0 1.5h1.5a.125.125 0 0 1 0 .25H3.5a.75.75 0 0 0 0 1.5h.625a.125.125 0 0 1 0 .25h-1.5a.75.75 0 0 0 0 1.5h1.5a1.625 1.625 0 0 0 1.37-2.5 1.625 1.625 0 0 0-1.37-2.5h-1.5Z" />
                        </svg>

                        <span class="sr-only">Ordered list</span>
                    </button>


                    {{-- Divider (Horizontal Rule) --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="setHorizontalRule()"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path d="M3.75 7.25a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5h-8.5Z" />
                        </svg>

                        <span class="sr-only">Horizontal rule</span>
                    </button>

                    {{-- Hard break --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="setHardBreak()"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd"
                                  d="M2 2.75c0 .414.336.75.75.75h6.5v7.94l-.97-.97a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.06 0l2.25-2.25a.75.75 0 1 0-1.06-1.06l-.97.97V2.75A.75.75 0 0 0 10 2H2.75a.75.75 0 0 0-.75.75Z"
                                  clip-rule="evenodd" />
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
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd"
                                  d="M12.5 9.75A2.75 2.75 0 0 0 9.75 7H4.56l2.22 2.22a.75.75 0 1 1-1.06 1.06l-3.5-3.5a.75.75 0 0 1 0-1.06l3.5-3.5a.75.75 0 0 1 1.06 1.06L4.56 5.5h5.19a4.25 4.25 0 0 1 0 8.5h-1a.75.75 0 0 1 0-1.5h1a2.75 2.75 0 0 0 2.75-2.75Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span class="sr-only">Undo</span>
                    </button>

                    {{-- Redo --}}
                    <button type="button"
                            class="bg-gray-600 rounded text-xs font-semibold text-gray-100 grid place-content-center w-10 aspect-square"
                            @click="redo()"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd"
                                  d="M3.5 9.75A2.75 2.75 0 0 1 6.25 7h5.19L9.22 9.22a.75.75 0 1 0 1.06 1.06l3.5-3.5a.75.75 0 0 0 0-1.06l-3.5-3.5a.75.75 0 1 0-1.06 1.06l2.22 2.22H6.25a4.25 4.25 0 0 0 0 8.5h1a.75.75 0 0 0 0-1.5h-1A2.75 2.75 0 0 1 3.5 9.75Z"
                                  clip-rule="evenodd" />
                        </svg>

                        <span class="sr-only">Redo</span>
                    </button>
                </div>

            </div>
        </template>
        <div class="w-full min-w-full prose md:prose-xl dark:prose-invert min-h-100 p-2" x-ref="element"></div>

    </div>
</div>
