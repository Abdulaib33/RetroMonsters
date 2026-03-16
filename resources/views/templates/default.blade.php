<!DOCTYPE html>
<html lang="fr">
    <head>
        @include('templates.partials._head')
    </head>
    
    <body class="bg-gray-800 text-white font-sans">

        <header class="bg-gray-900 shadow-lg relative top-8" x-data="{ open: false, loggedIn: true, userMenuOpen: false }">
                @include('templates.partials._header')
        </header>

        @include('templates.partials._main')

        <footer>
            @include('templates.partials._footer')
        </footer>
    </body>
</html>