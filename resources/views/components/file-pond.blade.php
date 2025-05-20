<div
    wire:ignore
    x-data
    x-init="
        FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.setOptions({
        server: {
            process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                @this.upload('{{ $attributes['wire:model'] }}', file, load, error, progress)
            },
            revert: (filename, load, error) => {
                @this.removeUpload('{{ $attributes['wire:model'] }}', filename, load)
            }
        }
    })
    FilePond.create($refs.input);

    "
>
    <div x-text="imageUrl"></div>
    <input type="file" x-ref="input">
</div>
