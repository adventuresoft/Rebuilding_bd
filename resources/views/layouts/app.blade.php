<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? config('app.name', 'Rebuilding Bangladesh') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100 antialiased">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(239,68,68,0.18),_transparent_35%),radial-gradient(circle_at_bottom_right,_rgba(234,179,8,0.16),_transparent_30%),linear-gradient(180deg,#020617_0%,#0f172a_55%,#111827_100%)]">
        <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
