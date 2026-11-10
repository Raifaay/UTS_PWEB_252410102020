<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sewa Digicam') | Amour Capture</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Roboto+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-amour-50 text-slate-700 font-sans antialiased">

    @if(!empty($username))
        <div class="md:flex min-h-screen">
            <x-navbar :username="$username" />

            <div class="flex-1 min-w-0 flex flex-col">
                <main class="flex-1 p-4 md:px-8 md:py-6">
                    @yield('content')
                </main>

                @include('components.footer')
            </div>
        </div>
    @else
        <main class="min-h-screen flex flex-col">
            @yield('content')
        </main>
    @endif

</body>
</html>