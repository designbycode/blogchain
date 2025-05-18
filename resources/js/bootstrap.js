import {
    Alpine,
    Livewire,
} from '../../vendor/livewire/livewire/dist/livewire.esm'
import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

import.meta.glob(['../img/**/*.{webp,png,svg,jpeg,jpg}'])

// window.axios = axios
//
// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

function tiptapEditor() {
    Alpine.data('editor', (content) => {
        let editor
        return {
            value: content,
            updatedAt: Date.now(),
            init() {
                const self = this
                editor = new Editor({
                    element: this.$refs.element,
                    extensions: [StarterKit],
                    content: this.value,
                    onCreate({ editor }) {
                        self.value = editor.getHTML()
                        self.updatedAt = Date.now()
                    },
                    onUpdate({ editor }) {
                        self.value = editor.getHTML()
                        self.updatedAt = Date.now()
                        self.$wire.set('content', self.value)
                    },
                    onSelectionUpdate({ editor }) {
                        self.updatedAt = Date.now()
                    },
                })
            },

            isLoaded() {
                return editor !== undefined
            },
            isActive(type, opts = {}) {
                return editor?.isActive?.(type, opts) ?? false
            },
            toggleHeading(opts) {
                editor.chain().toggleHeading(opts).focus().run()
            },
            toggleBold() {
                editor.chain().focus().toggleBold().run()
            },
            toggleItalic() {
                editor.chain().focus().toggleItalic().run()
            },
            toggleStrike() {
                editor.chain().focus().toggleStrike().run()
            },
            toggleCode() {
                editor.chain().focus().toggleCode().run()
            },
            toggleParagraph() {
                editor.chain().focus().setParagraph().run()
            },
            toggleBlockquote() {
                editor.chain().focus().toggleBlockquote().run()
            },
            toggleBulletList() {
                editor.chain().focus().toggleBulletList().run()
            },
            toggleOrderedList() {
                editor.chain().focus().toggleOrderedList().run()
            },
            toggleCodeBlock() {
                editor.chain().focus().toggleCodeBlock().run()
            },
            setHorizontalRule() {
                editor.chain().focus().setHorizontalRule().run()
            },
            setHardBreak() {
                editor.chain().focus().setHardBreak().run()
            },
            undo() {
                editor.chain().focus().undo().run()
            },
            redo() {
                editor.chain().focus().redo().run()
            },
        }
    })
}

document.addEventListener('alpine:init', tiptapEditor)

Livewire.start()
