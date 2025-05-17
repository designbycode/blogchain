import axios from 'axios'
import {
    Alpine,
    Livewire,
} from '../../vendor/livewire/livewire/dist/livewire.esm'

import { Editor } from '@tiptap/core'
import StarterKit from '@tiptap/starter-kit'

import.meta.glob(['../img/**/*.{webp,png,svg,jpeg,jpg}'])

window.axios = axios

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

function tiptapEditor() {
    Alpine.data('editor', (content, field) => {
        let editor
        return {
            value: content, // This is entangled with Livewire!
            updatedAt: Date.now(),
            init() {
                const _this = this
                editor = new Editor({
                    element: this.$refs.element,
                    extensions: [StarterKit],
                    content: this.value,
                    onCreate({ editor }) {
                        _this.value = editor.getHTML()
                        _this.updatedAt = Date.now()
                    },
                    onUpdate({ editor }) {
                        _this.value = editor.getHTML() // This updates Livewire!
                        _this.updatedAt = Date.now()
                    },
                    onSelectionUpdate({ editor }) {
                        _this.updatedAt = Date.now()
                    },
                })
            },
            isLoaded() {
                return editor
            },
            isActive(type, opts = {}) {
                return editor.isActive(type, opts)
            },
            toggleHeading(opts) {
                editor.chain().toggleHeading(opts).focus().run()
            },
            toggleBold() {
                editor.chain().focus().toggleBold().run()
            },
            toggleItalic() {
                editor.chain().toggleItalic().focus().run()
            },
        }
    })
}

document.addEventListener('alpine:init', tiptapEditor)

Livewire.start()
