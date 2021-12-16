<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- Tailwind UI --><!-- change using webpack after all feature finish -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css">

    <!-- Alpine --><!-- change using webpack after all feature finish -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    @livewireStyles
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">    <!-- Alpine --><!-- change using webpack after all feature finish -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.2.3/dist/trix.css">    <!-- Alpine --><!-- change using webpack after all feature finish -->
</head>
<body class="antialiased font-sans bg-gray-200">
    {{ $slot }}

    @livewireScripts
    <script src="https://unpkg.com/moment"></script><!-- change using webpack after all feature finish -->
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script><!-- change using webpack after all feature finish -->
    <script src="https://unpkg.com/trix@1.2.3/dist/trix.js"></script><!-- change using webpack after all feature finish -->
</body>
</html>
