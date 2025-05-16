<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth h-full dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title . ' | ' . config('app.name') : config('app.name')   }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,900&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased min-h-screen bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
<x-banner />
{{--<x-app::marquee></x-app::marquee>--}}
<x-app::navigation></x-app::navigation>

<!-- Page Content -->
<main id="main">
    {{ $slot }}
</main>

<x-app::footer />
@stack('modals')

<div
    x-data="{
    toasts: [],
    addToast(message, type = 'success') {
      const id = Date.now();
      this.toasts.push({ id, message, type });
      setTimeout(() => {
        this.toasts = this.toasts.filter(t => t.id !== id);
      }, 3000);
    }
  }"
    x-init="
    window.addEventListener('toast', e => {
      addToast(e.detail.message, e.detail.type);
    });
  "
    class="fixed top-5 right-5 space-y-3 z-50"
>
    <template x-for="(toast, index) in toasts" :key="toast.id">
        <div
            x-transition
            class="flex items-center gap-3 rounded-xl p-4 shadow-lg"
            :class="{
        'bg-green-100 text-green-700': toast.type === 'success',
        'bg-red-100 text-red-700': toast.type === 'error',
        'bg-yellow-100 text-yellow-700': toast.type === 'warning',
        'bg-blue-100 text-blue-700': toast.type === 'info'
      }"
        >
            <!-- Icon -->
            <svg x-show="toast.type === 'success'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <svg x-show="toast.type === 'error'" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-4h2v2h-2v-2zm0-8h2v6h-2V6z" clip-rule="evenodd" />
            </svg>

            <!-- Message -->
            <span class="text-sm font-medium" x-text="toast.message"></span>

        </div>
    </template>
</div>

@livewireScriptConfig
</body>
</html>
