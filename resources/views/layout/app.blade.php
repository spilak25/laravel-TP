<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    @yield('additionalHeader')

    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex" id="navbarNav">
                <a class="navbar-brand" href="{{ route('home') }}">Accueil</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs("task.index") ? 'active' : '' }}" href="{{ route('task.index') }}">Tâches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs("category.index") ? 'active' : '' }}" href="{{ route('category.index') }}">Catégories</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="p-4">
        @yield('content')
    </main>

    <!-- JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>